<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

// categories product
Route::get('alcohol/{category:slug}/{child:slug?}', [HomeController::class, 'category'])
    ->name('category');

// single product
Route::get('alcohol/{category}/{child}/{productSlug}/{product}', [HomeController::class, 'product'])
    ->name('product');



Route::get('/test', function () {

    $categories = Category::where('parent_id', null)->get();

    $test = $categories->pluck('children')->flatten();

    return view('test', [

        'categories' => $categories,
        'test' => $test
    
    ]);
});