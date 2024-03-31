<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function __construct(
        private readonly ProductService $productService
    ) {
    }

    public function index(): View
    {
        $products = $this->productService->getAllAvailable();

        return view('welcome', [
            'products' => $products,
            'cart' => session('cart')
        ]);
    }
}
