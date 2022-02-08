<?php

namespace App\Services;

use App\Models\Song;

class SongService extends BaseService
{
    public function getModel()
    {
        return Song::class;
    }
}
