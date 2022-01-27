<?php

namespace App\Services;

use App\Models\Feature;

class FeatureService extends BaseService
{
    public function getModel()
    {
        return Feature::class;
    }
}
