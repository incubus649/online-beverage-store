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

        return view('home.index', compact('products', 'categories'));
    }

    public function listings() 
    {
        // show products on listings page
        $categories = Category::whereNull('parent_id')
            ->get();
        
        // attributes
        $brands = Product::filter(request(['search','brand', 'alcohol_vlm', 'size', 'country']))
            ->selectRaw('brand, count(brand) as brandcount')
            ->groupByRaw('brand')
            ->get();

        $countries = Product::filter(request(['search','brand', 'alcohol_vlm', 'size', 'country']))
            ->selectRaw('country, count(country) as countrycount')
            ->groupByRaw('country')
            ->get();

        $sizes = Product::filter(request(['search','brand', 'alcohol_vlm', 'size', 'country']))
            ->selectRaw('size, count(size) as sizecount')
            ->groupByRaw('size')
            ->get();

        $alcohol_vlms = Product::filter(request(['search','brand', 'alcohol_vlm', 'size', 'country']))
            ->selectRaw('alcohol_vlm, count(alcohol_vlm) as alcohol_vlmcount')
            ->groupByRaw('alcohol_vlm')
            ->get();
        
        $products = Product::with('categories.parent')
            ->latest()
            ->filter(request(['search', 'brand', 'alcohol_vlm', 'size', 'country']))
            ->paginate(20);

        return view('products.index', compact('products', 'categories', 'brands', 'countries', 'sizes', 'alcohol_vlms'));
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

            // categories
            $brands = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('brand, count(brand) as brandcount')
                ->groupByRaw('brand')
                ->get();

            $countries = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('country, count(country) as countrycount')
                ->groupByRaw('country')
                ->get();

            $sizes = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('size, count(size) as sizecount')
                ->groupByRaw('size')
                ->get();

            $alcohol_vlms = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('alcohol_vlm, count(alcohol_vlm) as alcohol_vlmcount')
                ->groupByRaw('alcohol_vlm')
                ->get();

        } else if ($category) {
            // children of parent category
            $category_child = Category::where('parent_id', $category->id)->pluck('id');

            // products under children
            $products = Product::whereHas('categories', function($query) use ($category_child) {
                    $query->whereIn('category_id', $category_child);
                })
                ->with('categories.parent')
                ->paginate(20);

            // attributes
            $brands = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('brand, count(brand) as brandcount')
                ->groupByRaw('brand')
                ->get();

            $countries = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('country, count(country) as countrycount')
                ->groupByRaw('country')
                ->get();

            $sizes = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('size, count(size) as sizecount')
                ->groupByRaw('size')
                ->get();

            $alcohol_vlms = Product::whereHas('categories', function($query) use ($category_child) {
                $query->whereIn('category_id', $category_child);
            })
                ->selectRaw('alcohol_vlm, count(alcohol_vlm) as alcohol_vlmcount')
                ->groupByRaw('alcohol_vlm')
                ->get();

        }

        return view('products.index', compact('products', 'categories', 'brands', 'countries', 'sizes', 'alcohol_vlms'));
    }

    public function product($category, $child, $product_slug, Product $product)
    {
        // show one product
        $product->load('categories.parent');

        return view('products.show', compact('product'));

    }
}
