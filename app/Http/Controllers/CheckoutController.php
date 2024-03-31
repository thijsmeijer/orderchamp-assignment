<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(
        private readonly CartService $cartService
    ) {

    }

    public function __invoke(): View
    {
        return view('checkout', [
            'total' => $this->cartService->calculateTotalPrice(),
            'user' => auth()?->user()
        ]);
    }
}
