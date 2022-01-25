<?php

namespace App\Services;

use App\Models\User;

class PageService extends BaseService
{
    public function getModel()
    {
        return User::class;
    }
}
