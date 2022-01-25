<?php

namespace App\Services;

use App\Models\Cart;

class CartService extends BaseService
{
    public function getModel()
    {
        return Cart::class;
    }
}
