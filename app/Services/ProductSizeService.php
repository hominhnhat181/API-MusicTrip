<?php

namespace App\Services;

use App\Models\ProductSize;

class ProductSizeService extends BaseService
{
    public function getModel()
    {
        return ProductSize::class;
    }
}
