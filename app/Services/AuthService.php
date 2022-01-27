<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\User;

class AuthService
{
    public function getUserSocial(ProviderUser $providerUser, $social)
    {
        $user = User::where('email', $providerUser->getEmail());
        if ($social == 'google') {
            return $user->orWhere('google_id', $providerUser->getId())->first();
        }
        return $user->orWhere('facebook_id', $providerUser->getId())->first();
    }


    public function createUserSocial(ProviderUser $providerUser, $social){

        $user = $this->getUserSocial($providerUser, $social);
        if($user) return false;

        $data = [
            'email' => $providerUser->getEmail() ?? $providerUser->getNickname(),
            'name' => $providerUser->getName(),
            'status' => '1',
            'verified_at' => now()
        ];
        if($social == 'google'){
            $data['google_id'] = $providerUser->getId();
        }else{
            $data['facebook_id'] = $providerUser->getId();
        }
        return User::create($data);
    }

    
}




