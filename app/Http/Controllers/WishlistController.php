<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class WishlistController extends Controller
{
    // Show wishlist
    public function index()
    {
        if (auth()->user()) {
            if (auth()->user()->is_supplier) {
                return back();
            }

            if (auth()->user()->is_admin) {
                return back();
            }
        }

        $wishlist = Wishlist::where('user_id', auth()->user()->id)->latest()->get();

        return view('users.wishlist', compact('wishlist'));
    }

    // Store user create form
    public function store()
    {
        if (auth()->user()) {
            if (auth()->user()->is_supplier) {
                return back()->with('message', 'Wishlist is unavailable for suppliers!');
            }

            if (auth()->user()->is_admin) {
                return back()->with('message', 'Wishlist is unavailable for admins!');
            }
        }

        $product = Product::findOrFail(request()->input('product_id'));

        // Check if the product is already in the user's wishlist
        $wishlistItem = Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();

        if ($wishlistItem) {
            // Product already exists in the wishlist
            return redirect()->back()->with('message', 'Product is already in your wishlist');
        }

        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
        ]);

        return back()->with('message', 'Item added to wishlist!');
    }

    public function clear()
    {
        if (auth()->user()) {
            if (auth()->user()->is_supplier) {
                return back();
            }

            if (auth()->user()->is_admin) {
                return back();
            }
        }

        $product = request()->input('product_id');

        Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product)->delete();

        return back()->with('message', 'Product removed from the wishlist');
    }
}
