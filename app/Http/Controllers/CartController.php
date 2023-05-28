<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;

class CartController extends Controller
{
    // Store products to shopping cart
    public function store()
    {
        if (auth()->user()) {
            if (auth()->user()->is_supplier) {
                return back()->with('message', 'Cart is unavailable for suppliers!');
            }

            if (auth()->user()->is_admin) {
                return back()->with('message', 'Cart is unavailable for admins!');
            }
        }

        $product = Product::findOrFail(request()->input('product_id'));

        Cart::add(
            $product->id,
            $product->name,
            $product->price,
            1,
            array(
                'product' => $product,
            )
        );

        return back()->with('message', 'Product added to cart!');
    }

    // Remove products from shopping cart
    public function remove()
    {
        if (auth()->user()) {
            if (auth()->user()->is_supplier) {
                return back();
            }

            if (auth()->user()->is_admin) {
                return back();
            }
        }

        $product = Product::findOrFail(request()->input('product_id'));

        Cart::remove($product->id);

        return back()->with('message', 'Product removed from cart!');
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

        Cart::clear();

        return back()->with('message', 'Product cart cleared!');
    }
}
