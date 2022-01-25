<?php

namespace App\Services;

use App\Models\Order;

class OrderService extends BaseService
{
    public function getModel()
    {
        return Order::class;
    }
}
