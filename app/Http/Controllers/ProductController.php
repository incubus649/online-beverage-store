<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show($category, $child, $product_slug, Product $product)
    {
        $productsAll = Product::all();

        $product->load('categories.parent');
        $categories=Category::whereNull('parent_id')
            ->get();

        return view('products.show', compact('product', 'categories', 'productsAll'));
    }

    public function create()
    {
        $categories=Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        return view('products.create', compact('categories', 'productsAll'));
    }

    public function store()
    {
        $formFields = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'alcohol_vlm' => 'required',
            'stock' => 'required',
            'country' => 'required',
            'size' => 'required',
            'category' => 'required', 
        ]);

        if(request()->hasFile('image')){
            $formFields['image'] = request()->file('image')->store('covers', 'public');
        }
    
        // Generate slug from name
        $formFields['slug'] = Str::slug($formFields['name']);
    
        // Save product
        $product = Product::create($formFields);

        // Retrieve the selected category ID from the form submission
        $category_id = request('category');

        // Add the relationship between the product and the category to the pivot table
        $product->categories()->attach($category_id);

        // Redirect to product details page
        return redirect('/')->with('message', 'Product created successfully!');
    }
}
