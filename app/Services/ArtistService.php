<?php

namespace App\Services;

use App\Models\Artist;

class ArtistService extends BaseService
{
    public function getModel()
    {
        return Artist::class;
    }
}
