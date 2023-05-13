<?php

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

// all products
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/alcohol', [HomeController::class, 'listings'])
    ->name('listings');


// create product form
Route::get('/alcohol/product/create', [ProductController::class, 'createProduct'])
    ->name('createProduct');

Route::post('/alcohol', [ProductController::class, 'storeProduct'])
    ->name('listings');

// single product
Route::get('alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'showProduct'])
    ->name('product');

Route::post('/products', [ProductController::class, 'filter'])
    ->name('products.filter');



// create category form
Route::get('/alcohol/category/create', [HomeController::class, 'listings'])
    ->name('createCategory');

// categories product
Route::get('alcohol/{category:slug}/{child:slug?}', [HomeController::class, 'category'])
    ->name('category');