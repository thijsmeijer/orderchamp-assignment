<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartsController extends Controller
{
    public function show()
    {
        $cart = session('cart');

        return view('cart', [
            'cart' => $cart,
        ]);
    }
    public function addToCart(Product $product): RedirectResponse
    {
        if(! Session::get('cart')) {
            Session::put('cart', [$product]);
        } else {
          $currentProducts = Session::get('cart');

          $currentProducts[] = $product;

          Session::put('cart', $currentProducts);
        }

        return redirect(route('products.index'));
    }
}
