<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
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

// P R O D U C T T Y P E S
Route::resource('/producttype', 'App\Http\Controllers\ProductTypeController');

// S H O P P I N G C A R T
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// O R D E R S
Route::post('/finish', [\App\Http\Controllers\OrderController::class, 'finish'])->name('order.finish');
Route::get('/checkout', [\App\Http\Controllers\OrderController::class, 'show'])->name('order.show');

// R E V I E W S 
Route::post('add-review', [ReviewController::class, 'addReview'])->name('add.review');
Route::patch('update-review', [ReviewController::class, 'update'])->name('update.review');
Route::delete('remove-review', [ReviewController::class, 'remove'])->name('remove.review');
