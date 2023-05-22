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

    public function listings(Category $category = null, Category $child = null)
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();
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
        
        if ($category) {
            $products = Product::whereHas('categories', function($query) use ($categoryChild) { 
                $query->whereIn('category_id', $categoryChild); 
            })
                ->with('categories.parent')
                ->latest()
                ->filter($filter)
                ->paginate(16);
        } else {

            $products = Product::with('categories.parent')
                ->latest()
                ->filter($filter)
                ->paginate(16);
        }

        if (request()->sort == 'newest') {
            $products = $products
                ->latest()
                ->paginate(16);
        } else if (request()->sort == 'high-to-low') {
            $products = $products
                ->sortByDesc('price')
                ->paginate(16);
        } else if (request()->sort == 'low-to-high') {
            $products = $products
                ->sortBy('price')
                ->paginate(16);
        }

        return view('products.index', compact('products', 'categories', 'brands', 'countries', 'sizes', 'alcohol_vlms', 'categoryName', 'productsAll'));
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

        if (request()->has('description')) {
            $formFields['description'] = request()->str('description');
        }

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

    public function edit($category, $child, $product_slug, Product $product)
    {
        $product;
        $categories=Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();
        return view('products.edit', compact('categories', 'productsAll', 'product'));
    }

    public function update($category, $child, $product_slug, Product $product)
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

        if (request()->has('description')) {
            $formFields['description'] = request()->str('description');
        }

        if(request()->hasFile('image')){
            $formFields['image'] = request()->file('image')->store('covers', 'public');
        }
    
        // Generate slug from name
        $formFields['slug'] = Str::slug($formFields['name']);
    
        // Save product
        $product->update($formFields);

        // Retrieve the selected category ID from the form submission
        $category_id = request('category');

        // Add the relationship between the product and the category to the pivot table
        $product->categories()->detach();
        $product->categories()->attach($category_id);

        // Redirect to product details page
        return redirect()->route('product.show', [$category, $child, $product->slug, $product->id])->with('message', 'Product updated successfully!');
    }

    public function destroy($category, $child, $product_slug, Product $product) {
        $product->categories()->detach();
        $product->delete();
        return redirect()->route('listings', [$category, $child])->with('message', 'Product deleted successfully!');
    }
}
