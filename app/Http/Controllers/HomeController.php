<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show products on home.index page
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::with('categories.parent')->latest()->paginate(8);
        $productsAll = Product::all();

        return view('home.index', compact('products', 'categories', 'productsAll'));
    }

    // Show about view
    public function about()
    {
        $categories = Category::whereNull('parent_id')->get();
        $productsAll = Product::all();

        return view('home.about', compact('categories', 'productsAll'));
    }

    // Show contacts view
    public function contacts()
    {
        $categories = Category::whereNull('parent_id')->get();
        $productsAll = Product::all();

        return view('home.contacts', compact('categories', 'productsAll'));
    }

    // Show suppliers promo view
    public function suppliers()
    {
        $categories = Category::whereNull('parent_id')->get();
        $productsAll = Product::all();

        return view('home.suppliers', compact('categories', 'productsAll'));
    }
}
