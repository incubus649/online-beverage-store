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
        $products = Product::with('categories')
            ->latest()
            ->take(20)
            ->get();

        return view('index', compact('products'));
    }

    public function category(Category $category, Category $child = null)
    {
        // show products with certain category

        $products = null;

        if ($child) {
            // i dont know another way to make it work
            // array of child id (it is just one int)
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


        
        // show products with certain category

        /*
        if ($child) {
            $products = Product::with('categories')
            ->latest()
            ->take(20)
            ->get();

        return view('index', compact('products'));
        } else if ($category) {
            $category_slug_id = Category::where('slug', function($query) use ($category) {
                $query->whereIn('slug', $category::with('categories.children')->pluck('slug'));
            })
                ->with('products.children')
                ->pluck('id');
            dd($category_slug_id);
            
            $category_child = Category::where('parent_id', $category_slug_id)->pluck('id');
            //dd($category_child);

            $products = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
            ->with('categories.parent')
            ->paginate(9);
        }
        */

        return view('index', compact('products'));
    }

    public function product($category, $child, Product $product)
    {
        
        // show one product

    }
}
