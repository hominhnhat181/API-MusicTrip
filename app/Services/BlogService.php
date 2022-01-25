<?php

namespace App\Services;

use App\Models\Blog;

class BlogService extends BaseService
{
    public function getModel()
    {
        return Blog::class;
    }
}
