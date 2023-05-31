<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class CategoryController extends Controller
{

    // Show categories
    public function manage()
    {
        $categories = Category::whereNull('parent_id')->paginate(20);

        return view('admins.categories', compact('categories'));
    }

    // Show create category form
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admins.category-create', compact('categories'));
    }

    // Store category create form
    public function store()
    {
        $formFields = request()->validate([
            'name' => 'required', Rule::unique('categories', 'name'),
        ]);

        if (request()->has('parent_id')) {
            if (request()->integer('parent_id') == 0) {
                $formFields['parent_id'] = null;
            } else {
                $formFields['parent_id'] = request()->integer('parent_id');
            }
        }

        $formFields['slug'] = Str::slug($formFields['name']);

        Category::create($formFields);

        return redirect()->route('admin.categories')->with('message', 'Category created successfully!');
    }

    // Show edit category form
    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admins.category-edit', compact('category', 'categories'));
    }

    // Update product edit form
    public function update(Category $category)
    {
        $formFields = request()->validate([
            'name' => 'unique:categories,name,' . $category->id,
        ]);

        if (request()->has('parent_id')) {
            if (request()->integer('parent_id') == 0) {
                $formFields['parent_id'] = null;
            } else {
                $formFields['parent_id'] = request()->integer('parent_id');
            }
        }

        $formFields['slug'] = Str::slug($formFields['name']);

        $category->update($formFields);

        return redirect()->route('admin.categories')->with('message', 'Category updated successfully!');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->children()->update(['parent_id' => null]);
        $category->delete();
        return redirect()->route('admin.categories')->with('message', 'Category deleted successfully!');
    }
}
