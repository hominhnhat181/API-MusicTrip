<?php

namespace App\Services;

use App\Models\Album;

class AlbumService extends BaseService
{
    public function getModel()
    {
        return Album::class;
    }
}
