<?php

namespace App\Services;

class CartService
{
    public function calculateTotalPrice(): int
    {
        $products = session('cart');

        $total = 0;

        foreach ($products as $product) {
            $total += $product->price;
        }

        return $total;
    }
}
