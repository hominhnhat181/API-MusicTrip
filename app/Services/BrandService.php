<?php

namespace App\Services;

use App\Models\Brand;

class BrandService extends BaseService
{
    public function getModel()
    {
        return Brand::class;
    }
}
