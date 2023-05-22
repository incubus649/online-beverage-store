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
Route::get('/about', [HomeController::class, 'about'])
    ->name('about');
Route::get('/contacts', [HomeController::class, 'contacts'])
    ->name('contacts');

// Product CRUD
Route::get('/alcohol/product/create', [ProductController::class, 'create'])
    ->name('product.create');
Route::post('/alcohol', [ProductController::class, 'store'])
    ->name('product.store');
Route::get('/alcohol/{category}/{child}/{productSlug}/{product}/edit', [ProductController::class, 'edit'])
    ->name('product.edit');
Route::put('/alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'update'])
    ->name('product.update');
Route::delete('/alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'destroy'])
    ->name('product.destroy');


Route::get('alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('alcohol/{category:slug?}/{child:slug?}', [HomeController::class, 'listings'])
    ->name('listings');

Route::post('/store', [CartController::class, 'store'])
    ->name('cart.store');
Route::post('/remove', [CartController::class, 'remove'])
    ->name('cart.remove');