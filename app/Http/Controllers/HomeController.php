<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        // show products on home page
        $categories = Category::whereNull('parent_id')
            ->get();
            
        $products = Product::with('categories.parent')
            ->latest()
            ->paginate(20);

        return view('index', compact('products', 'categories'));
    }

    public function category(Category $category, Category $child = null)
    {
        // show products with certain category

        $categories = Category::whereNull('parent_id')
            ->get();
        $products = null;

        if ($child) {
            // i dont know another way to make this work
            // array of child id (just one int)
            $category_child = Category::where('id', $child->id)->pluck('id');

            // products under children
            $products = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->with('categories.parent')
                ->paginate(20);

        } else if ($category) {
            // children of parent category
            $category_child = Category::where('parent_id', $category->id)->pluck('id');

            // products under children
            $products = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->with('categories.parent')
                ->paginate(20);

        }

        return view('index', compact('products', 'categories'));
    }

    public function product($category, $child, $product_slug, Product $product)
    {
        
        // show one product
        $product->load('categories.parent');

        return view('product', compact('product'));

    }
}
