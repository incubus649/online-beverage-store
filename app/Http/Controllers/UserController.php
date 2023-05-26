<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    // Show Register/Create user form
    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        return view('users.register', compact('categories', 'productsAll'));
    }

    // Store user create form
    public function store()
    {
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'User created and loged in!');
    }

    // Show login user form
    public function login()
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        return view('users.login', compact('categories', 'productsAll'));
    }

    // Authenticate user
    public function authenticate()
    {
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            request()->session()->regenerate();
            return redirect(route('user.dashboard'))->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    // Logout
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Dashboard
    public function dashboard()
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        return view('users.index', compact('categories', 'productsAll'));
    }
}
