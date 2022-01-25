<?php

namespace App\Services;

use App\Models\User;

class AdminService
{

    const NOT_FOUND = -1;
    const PASSWORD_ERROR = 0;
    const SUCCESS = 1;

    /**
     * Admin login by data
     * 
     * @param array $data
     * @return integer
     */
    public function login($data){
        $admin = User::where('email', 'LIKE', $data['email'])->first();
        if(!$admin) return self::NOT_FOUND;
        if(!\Hash::check($data['password'], $admin->password)) return self::PASSWORD_ERROR;

        \Auth::login($admin);
        // \Auth::attempt($admin);

        return self::SUCCESS;
    }

    /**
     * Logout admin
     * 
     * @return boolean
     */
    public function logout(){
        return \Auth::logout();
    }
}

?>