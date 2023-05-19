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

    public function listings(Category $category = null, Category $child = null)
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $filter = request()->only(['search','brand', 'alcohol_vlm', 'size', 'country']);

        $categoryName = 'Alcohol';
        $categoryChild = Product::with('categories.parent')->pluck('id');

        if ($category) {
            $categoryName = $child ? $child->name : $category->name;
            $categoryChild = $child ? Category::where('id', $child->id)->pluck('id') : Category::where('parent_id', $category->id)->pluck('id');
        }
        
        $brands = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('brand, count(brand) as brandcount')
            ->groupByRaw('brand')
            ->orderBy('brand')
            ->get();
        $countries = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('country, count(country) as countrycount')
            ->groupByRaw('country')
            ->orderBy('country')
            ->get();
        $sizes = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('size, count(size) as sizecount')
            ->groupByRaw('size')
            ->orderBy('size')
            ->get();
        $alcohol_vlms = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->filter($filter)
            ->selectRaw('alcohol_vlm, count(alcohol_vlm) as alcohol_vlmcount')
            ->groupByRaw('alcohol_vlm')
            ->orderBy('alcohol_vlm')
            ->get();
        
        $products = Product::whereHas('categories', function($query) use ($categoryChild) { 
            $query->whereIn('category_id', $categoryChild); 
        })
            ->with('categories.parent')
            ->latest()
            ->filter($filter)
            ->paginate(20);

        if (request()->sort == 'newest') {
            $products = $products
                ->latest()
                ->paginate(20);
        } else if (request()->sort == 'high-to-low') {
            $products = $products
                ->sortByDesc('price')
                ->paginate(20);
        } else if (request()->sort == 'low-to-high') {
            $products = $products
                ->sortBy('price')
                ->paginate(20);
        }

        return view('products.index', compact('products', 'categories', 'brands', 'countries', 'sizes', 'alcohol_vlms', 'categoryName'));
    }
}
