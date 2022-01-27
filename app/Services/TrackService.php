<?php

namespace App\Services;

use App\Models\Track;

class TrackService extends BaseService
{
    public function getModel()
    {
        return Track::class;
    }
}
