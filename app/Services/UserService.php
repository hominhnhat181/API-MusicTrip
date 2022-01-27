<?php

namespace App\Services;

use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
// use App\Mail\VerifyCode;
// use App\Enums\UserStatus;

class UserService extends BaseService
{   

    public function getModel()
    {
        return User::class;
    }



    const USER_NOT_EXISTS = 0;
    const VERIFY_CODE_INCORRECT = -1;
    const VERIFY_CODE_EXPIRED = -2;
    const SUCCESS = 1;

    /**
     * Get user from social 
     * 
     * @param Laravel\Socialite\Contracts\User $providerUser
     * @param string social
     * 
     * @return \App\Models\User
     */
    public function getUserSocial(ProviderUser $providerUser, $social)
    {
        $user = User::where('email', $providerUser->getEmail());
        if ($social == 'google') {
            return $user->orWhere('google_id', $providerUser->getId())->first();
        }
        return $user->orWhere('facebook_id', $providerUser->getId())->first();
    }

    /**
     * Create user social
     * 
     * @param Laravel\Socialite\Contracts\User $providerUser
     * @param string social
     * 
     * @return \App\Models\User
     */
    public function createUserSocial(ProviderUser $providerUser, $social)
    {

        $user = $this->getUserSocial($providerUser, $social);
        if ($user) return false;

        $data = [
            'email' => $providerUser->getEmail() ?? $providerUser->getNickname(),
            'name' => $providerUser->getName(),
            'status' => '1',
            'verified_at' => now()
        ];
        if ($social == 'google') {
            $data['google_id'] = $providerUser->getId();
        } else {
            $data['facebook_id'] = $providerUser->getId();
        }
        return User::create($data);
    }

    /**
     * Create user from request
     * 
     * @param array $data
     * 
     * @return \App\Models\User
     */
    public function createUser($data)
    {
        if (isset($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        }

        $code = strval(mt_rand(1000, 9999));
        $data['code_verify'] = \Hash::make($code);
        $data['expired_at'] = now()->addMinutes(10); // expired after 10 minutes
        $user = User::create($data);

        \Mail::to($user->email)->queue(new VerifyCode($user, $code));

        return $user;
    }

    /**
     * Login user
     * @param string $data
     * @return $user
     */
    public function findUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Handle verify code by user
     * 
     * @param string $email
     * @param string $code
     * @return mixed
     */
    public function verifyCodeUser($email, $code)
    {
        $user = User::where('email', $email)->first();

        if (!$user) return self::USER_NOT_EXISTS;

        if (!\Hash::check($code, $user->code_verify)) return self::VERIFY_CODE_INCORRECT;

        if ($user->expired_at < now()) return self::VERIFY_CODE_EXPIRED;

        $user->update([
            'verified_at' => now(),
            'code_verify' => null,
            'expired_at' => null,
            'status' => UserStatus::ACTIVE
        ]);

        return $user;
    }

    /**
     * send code verify to user
     * 
     * @param string $email
     * 
     */
    public function sendCodeVerifyToUser($email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) return self::USER_NOT_EXISTS;

        $code = strval(mt_rand(1000, 9999));
        $data = [
            'code_verify' => \Hash::make($code),
            'expired_at' => now()->addMinutes(10),
        ];
        $user->update($data);
        \Mail::to($user->email)->queue(new VerifyCode($user, $code));
        return true;
    }


    /**
     * Handle confirm code to reset password by user
     * 
     * @param string $email
     * @param string $code
     * 
     * @return int
     */
    public function confirmCodeToResetPassword($email, $code)
    {
        $user = User::where('email', $email)->first();

        if (!$user) return self::USER_NOT_EXISTS;

        if (!\Hash::check($code, $user->code_verify)) return self::VERIFY_CODE_INCORRECT;

        if ($user->expired_at < now()) return self::VERIFY_CODE_EXPIRED;

        return self::SUCCESS;
    }
}
