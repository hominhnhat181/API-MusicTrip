<?php

namespace App\Services;

use App\Models\Tag;

class GenreService extends BaseService
{
    public function getModel()
    {
        return Tag::class;
    }
}
