<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function store() {
        $product = Product::findOrFail(request()->input('product_id'));

        Cart::add(
            $product->id, 
            $product->name, 
            $product->price, 
            1, 
            array(
                'product' => $product,
                'product_slug' => $product->slug,
                'category_slug' => $product->categories->first()->slug,
                'categories' => $product->categories,

                'category' => $product->categories->first()->name
            )
        );

        return back();
    }

    public function remove() {
        $product = Product::findOrFail(request()->input('product_id'));

        Cart::remove($product->id);

        return back();
    }
}
