<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::with('categories.parent')->latest()->paginate(20);

        return view('home.index', compact('products', 'categories'));
    }

    public function listings() 
    {
        $categoryName = 'Alcohol';

        $categories = Category::whereNull('parent_id')
            ->get();
        $filter = request()->only(['search','brand', 'alcohol_vlm', 'size', 'country']);
        
        $products = Product::with('categories.parent')
            ->latest()
            ->filter($filter)
            ->paginate(20);
        
        $brands = Product::filter($filter)
            ->selectRaw('brand, count(brand) as brandcount')
            ->groupByRaw('brand')
            ->get();
        $countries = Product::filter($filter)
            ->selectRaw('country, count(country) as countrycount')
            ->groupByRaw('country')
            ->get();
        $sizes = Product::filter($filter)
            ->selectRaw('size, count(size) as sizecount')
            ->groupByRaw('size')
            ->get();
        $alcohol_vlms = Product::filter($filter)
            ->selectRaw('alcohol_vlm, count(alcohol_vlm) as alcohol_vlmcount')
            ->groupByRaw('alcohol_vlm')
            ->get();

        return view('products.index', compact('products', 'categories', 'brands', 'countries', 'sizes', 'alcohol_vlms', 'categoryName'));
    }

    public function category(Category $category, Category $child = null)
    {
        $categoryName = $child ? $child->name : $category->name;
        $categories = Category::whereNull('parent_id')
            ->get();
        $categoryChild = $child ? Category::where('id', $child->id)->pluck('id') : Category::where('parent_id', $category->id)->pluck('id');

        $filter = request()->only(['search','brand', 'alcohol_vlm', 'size', 'country']);
        
        $brands = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('brand, count(brand) as brandcount')
            ->groupByRaw('brand')
            ->get();
        $countries = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('country, count(country) as countrycount')
            ->groupByRaw('country')
            ->get();
        $sizes = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('size, count(size) as sizecount')
            ->groupByRaw('size')
            ->get();
        $alcohol_vlms = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('alcohol_vlm, count(alcohol_vlm) as alcohol_vlmcount')
            ->groupByRaw('alcohol_vlm')
            ->get();
        
        $products = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->with('categories.parent')
            ->latest()
            ->filter($filter)
            ->paginate(20);

        return view('products.index', compact('products', 'categories', 'brands', 'countries', 'sizes', 'alcohol_vlms', 'categoryName'));
    }
}
