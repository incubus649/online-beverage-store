<?php

use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/alcohol', [HomeController::class, 'listings'])
    ->name('listings');

Route::get('/alcohol/product/create', [ProductController::class, 'createProduct'])
    ->name('createProduct');
//Route::post('/alcohol', [ProductController::class, 'storeProduct'])
//    ->name('listings');
Route::get('alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'showProduct'])
    ->name('product');

Route::get('alcohol/{category:slug?}/{child:slug?}', [HomeController::class, 'listings'])
    ->name('listings');

Route::post('/', [CartController::class, 'store'])
    ->name('cart.store');