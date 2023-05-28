<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    // Show all users
    public function users()
    {
        $users = User::latest();

        if (request()->sort == 'all') {
            $users;
        } else if (request()->sort == 'customers') {
            $users = $users
                ->where('is_supplier', false)
                ->where('is_admin', false);
        } else if (request()->sort == 'admins') {
            $users = $users
                ->where('is_admin', true);
        } else if (request()->sort == 'suppliers') {
            $users = $users
                ->where('is_supplier', true);
        }

        $users = $users->paginate(20);

        return view('admins.users', compact('users'));
    }

    // Dashboard
    public function dashboard()
    {
        return view('users.index');
    }

    // All products
    public function manage()
    {
        $products = Product::paginate(20);
        return view('admins.manage', compact('products'));
    }
}
