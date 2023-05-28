<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SupplierController extends Controller
{
    // Show Register/Create supplier form
    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        return view('suppliers.register', compact('categories', 'productsAll'));
    }

    // Store supplier create form
    public function store()
    {
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'company_name' => ['required', 'min:3', Rule::unique('users', 'company_name')],
            'address' => 'required',
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['is_supplier'] = true;

        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'Company created and loged in!');
    }

    // Dashboard
    public function dashboard()
    {
        return view('suppliers.index');
    }

    // Show supplier edit form
    public function edit(User $user)
    {
        if (!auth()->user()->is_admin && auth()->user()->id != $user->id) {
            abort('403', 'Unauthorized Action!');
        }
        return view('suppliers.edit', compact('user'));
    }
}
