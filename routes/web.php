<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WishlistController;

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

// Home routes
Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/about', [HomeController::class, 'about'])
    ->name('about');
Route::get('/contacts', [HomeController::class, 'contacts'])
    ->name('contacts');
Route::get('/suppliers', [HomeController::class, 'suppliers'])
    ->name('suppliers');

// Products order
Route::get('/order', [OrderController::class, 'create'])
    ->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])
    ->name('order.store');

// Product CRUD
Route::get('/alcohol/products/create', [ProductController::class, 'create'])
    ->middleware('auth')
    ->name('product.create');
Route::post('/alcohol/store', [ProductController::class, 'store'])
    ->name('product.store');
Route::get('/alcohol/{category}/{child}/{productSlug}/{product}/edit', [ProductController::class, 'edit'])
    ->middleware('auth')
    ->name('product.edit');
Route::put('/alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'update'])
    ->middleware('auth')
    ->name('product.update');
Route::delete('/alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'destroy'])
    ->middleware('auth')
    ->name('product.destroy');

// Show products
Route::get('/alcohol/{category}/{child}/{productSlug}/{product}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('/alcohol/{category:slug?}/{child:slug?}', [ProductController::class, 'listings'])
    ->name('listings');

// Cart
Route::post('/store', [CartController::class, 'store'])
    ->name('cart.store');
Route::post('/remove', [CartController::class, 'remove'])
    ->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])
    ->name('cart.clear');

// User register
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest')
    ->name('user.create');
Route::post('/users', [UserController::class, 'store'])
    ->middleware('guest')
    ->name('user.store');

// Supplier register
Route::get('/suppliers/register', [SupplierController::class, 'create'])
    ->middleware('guest')
    ->name('supplier.create');
Route::get('/suppliers/store', [SupplierController::class, 'store'])
    ->middleware('guest')
    ->name('supplier.store');

// User login/authenticate/logout
Route::get('/login', [UserController::class, 'login'])
    ->middleware('guest')
    ->name('user.login');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])
    ->middleware('guest')
    ->name('user.authenticate');
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth')
    ->name('user.logout');

// User update/delete
Route::get('/users/edit', [UserController::class, 'edit'])
    ->middleware('auth')
    ->name('user.edit');
Route::put('/users/{user}', [UserController::class, 'update'])
    ->middleware('auth')
    ->name('user.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->middleware('auth')
    ->name('user.destroy');

// User password update
Route::get('/users/password/edit', [UserController::class, 'passwordEdit'])
    ->middleware('auth')
    ->name('password.edit');
Route::put('/users/password/{user}', [UserController::class, 'passwordUpdate'])
    ->middleware('auth')
    ->name('password.update');

// User dashboard
Route::get('/users/dashboard', [UserController::class, 'dashboard'])
    ->middleware('auth')
    ->name('user.dashboard');
Route::get('/users/orders', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('user.orders');

// User wishlist
Route::get('/users/wishlist', [WishlistController::class, 'index'])
    ->middleware('auth')
    ->name('wishlist.index');
Route::post('/users/wishlist/store', [WishlistController::class, 'store'])
    ->middleware('auth')
    ->name('wishlist.store');
Route::post('/users/wishlist/clear', [WishlistController::class, 'clear'])
    ->middleware('auth')
    ->name('wishlist.clear');
