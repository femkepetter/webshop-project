<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// P R O D U C T S
Route::resource('/product', 'App\Http\Controllers\ProductController');

// C A T E G O R I E S
Route::resource('/category', 'App\Http\Controllers\CategoryController');

// S H O P P I N G C A R T
Route::put('/addtocart/{product}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('product.cart');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
Route::delete('/cart/{index}', [\App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::put('/addcart/{index}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::put('/subcart/{index}', [\App\Http\Controllers\CartController::class, 'sub'])->name('cart.sub');
