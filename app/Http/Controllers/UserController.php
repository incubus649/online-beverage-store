<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


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

    // Show user edit form
    public function edit(User $user)
    {
        if (!auth()->user()->is_admin && auth()->user()->id != $user->id) {
            abort('403', 'Unauthorized Action!');
        }

        if ($user->is_admin) {
            if (auth()->user()->id != $user->id) {
                abort('403', 'Unauthorized Action!');
            }
        }

        return view('users.edit', compact('user'));
    }

    // Update user information
    public function update(User $user)
    {
        if (!auth()->user()->is_admin && auth()->user()->id != $user->id) {
            abort('403', 'Unauthorized Action!');
        }

        if ($user->is_admin) {
            if (auth()->user()->id != $user->id) {
                abort('403', 'Unauthorized Action!');
            }
        }

        if ($user->is_supplier) {

            $formFields = request()->validate([
                'name' => ['required', 'min:3'],
                'email' => 'unique:users,email,' . $user->id,
                'company_name' => 'unique:users,company_name,' . $user->id,
                'address' => 'required',
            ]);

            $user->update($formFields);

            if (request()->hasFile('logo')) {
                $formFields['logo'] = request()->file('logo')->store('logos', 'public');
            }

            if (auth()->user()->is_admin) {
                return redirect()->route('admin.users')->with('message', 'Supplier information has been updated!');
            }

            return redirect()->route('supplier.dashboard', compact('user'))->with('message', 'Your information has been updated!');
        }

        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => 'unique:users,email,' . $user->id,
        ]);

        $user->update($formFields);

        if (auth()->user()->is_admin) {
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard')->with('message', 'Your information has been updated!');
            }
            return redirect()->route('admin.users')->with('message', 'User information has been updated!');
        }

        return redirect()->route('user.dashboard')->with('message', 'Your information has been updated!');
    }

    // Show user password edit form
    public function passwordEdit(User $user)
    {
        if (auth()->user()->id != $user->id) {
            abort('403', 'Unauthorized Action!');
        }

        return view('users.password-edit');
    }

    // Store user password edit form
    public function passwordUpdate(User $user)
    {
        if (auth()->user()->id != $user->id) {
            abort('403', 'Unauthorized Action!');
        }

        request()->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check(request()->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect!']);
        }

        $user->password = bcrypt(request()->input('password'));
        $user->save();

        if ($user->is_admin) {
            return redirect()->route('admin.dashboard')->with('message', 'Password updated successfully!');
        }

        if (auth()->user()->is_supplier) {
            return redirect()->route('supplier.dashboard')->with('message', 'Password updated successfully!');
        }

        if (auth()->user()->is_admin) {
            return redirect()->route('admin.users')->with('message', 'Accounts password updated successfully!');
        }

        return redirect()->route('user.dashboard')->with('message', 'Password updated successfully!');
    }

    // Update user information
    public function destroy(User $user)
    {
        $user->orders()->update(['user_id' => null]);
        $user->delete();

        if (auth()->user()->is_admin && !$user->is_admin) {
            return redirect()->route('admin.users')->with('message', 'User deleted successfully!');
        }
        return redirect()->route('home')->with('message', 'User deleted successfully!');
    }

    // Dashboard
    public function dashboard()
    {
        if (auth()->user()->is_supplier) {
            return redirect()->route('supplier.dashboard');
        }

        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('users.index');
    }
}
