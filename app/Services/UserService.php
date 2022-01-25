<?php

namespace App\Services;

use App\Models\User;

class UserService extends BaseService
{
    public function getModel()
    {
        return User::class;
    }
}
