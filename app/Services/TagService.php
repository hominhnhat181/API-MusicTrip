<?php

namespace App\Services;

use App\Models\Tag;

class TagService extends BaseService
{
    public function getModel()
    {
        return Tag::class;
    }
}
