<?php

namespace App\Services;

use App\Models\Album;

class AdminService extends BaseService
{
    public function getModel()
    {
        return Album::class;
    }
}
