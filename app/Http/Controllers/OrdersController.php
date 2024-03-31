<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\User;
use App\Models\Voucher;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function __construct(
        private readonly CartService $cartService
    ) {
    }

    public function index(): View
    {
        $orders = Order::where('user_id', auth()->id())->get();

        return view('orders', [
            'orders' => $orders,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $products = session('cart');

        $user = auth()?->user();

        $user?->update([
            'name', $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $order = Order::create([
            'user_id' => auth()?->id(),
            'total' => $this->cartService->calculateTotalPrice(),
            'address' => $request->address,
        ]);

        foreach($products as $product) {
            OrderLine::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
            ]);
        }

        if($request->discount) {
            $voucher = Voucher::where('code', $request->discount)->where('is_used', false);

            $voucher?->update([
                'is_used' => true,
            ]);
        }

        session()->forget('cart');


        return redirect(route('orders.index'));
    }
}
