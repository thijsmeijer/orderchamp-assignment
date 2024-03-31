<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getAllAvailable(): Collection
    {
        return Product::all()->where('stock', '>', 0);
    }
}
