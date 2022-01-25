<?php

namespace App\Services;

use App\Models\ProductColor;

class ProductColorService extends BaseService
{
    public function getModel()
    {
        return ProductColor::class;
    }
}
