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
    public function showProduct($category, $child, $product_slug, Product $product)
    {
        $product->load('categories.parent');

        return view('products.show', compact('product'));
    }

    public function createProduct()
    {
        $categories=Category::whereNull('parent_id')
            ->get();
        return view('products.create', compact('categories'));
    }

    public function storeProduct()
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
