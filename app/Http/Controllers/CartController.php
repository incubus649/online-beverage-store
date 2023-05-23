<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;

class CartController extends Controller
{
    // Store products to shopping cart
    public function store()
    {
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

    // Remove products from shopping cartS
    public function remove()
    {
        $product = Product::findOrFail(request()->input('product_id'));

        Cart::remove($product->id);

        return back()->with('message', 'Product removed from cart!');
    }

    public function clear()
    {
        Cart::clear();

        return back()->with('message', 'Product cart cleared!');
    }
}
