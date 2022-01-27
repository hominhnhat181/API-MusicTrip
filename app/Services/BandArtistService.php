<?php

namespace App\Services;

use App\Models\Artist;

class BandArtistService extends BaseService
{
    public function getModel()
    {
        return Artist::class;
    }
}
