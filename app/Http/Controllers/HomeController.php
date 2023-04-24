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
        $products = Product::with('categories.parent')
            ->latest()
            ->take(9)
            ->get();

        return view('index', compact('products'));
    }

    public function category(Category $category, Category $child = null)
    {
        // show products with certain category

        /*
        $products = null;
        $ids = collect();
        $selected_categories = [];

        if ($child) {
            $sub_category = $child->children()->where('slug', $child)->firstOrFail();
            $ids = collect($sub_category->id);
            $selected_categories = [$category->id, $child->id, $sub_category->id];
        } elseif ($category) {
            $category->load('children.children');
            $ids = collect();
            $selected_categories[] = $category->id;

            foreach ($category->children as $sub_category) {
                $ids = $ids->merge($sub_category->children->pluck('id'));
            }
        }

        $products = Product::whereHas('categories', function ($query) use ($ids) {
                $query->whereIn('id', $ids);
            })
            ->with('categories.parent')
            ->paginate(9);

        return view('index', compact('products', 'selected_categories'));

        */
 
        // id of categories
        $ids = collect();

        // if child exists
        if ($child) {
            $id =  $child->children->pluck('id'); 
            dd($id);
        } else if ($category) { // if category exists
            echo('hi');
        }   

        $products = Product::with('categories')->whereHas('categories', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        });
        


        return view('index', compact('products'));
    }

    public function product($category, $child, $product_slug, Product $product)
    {
        
        // show one product

        

        $product->load('categories.parent');
        $child = $product->children->where('slug', $child)->first();
        $selectedCategories = [];

        if ($child &&
            $child->parentCategory
        ) {
            $selectedCategories = [
                $child->parentCategory->id ?? null,
                $child->id
            ];
        }

        return view('product', compact('product', 'selectedCategories'));
    }
}
