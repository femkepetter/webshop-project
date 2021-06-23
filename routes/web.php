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
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
