<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductsController::class, 'index'])->name('products.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/addToCart/{product}', [CartsController::class, 'addToCart'])->name('carts.add-to-cart');

Route::get('/cart', [CartsController::class, 'show'])->name('carts.show');


Route::post('/checkout', CheckoutController::class)->name('checkout');

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::post('/order/store', [OrdersController::class, 'store'])->name('orders.store');


