<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function store(Request $request) {
        
        $product = Product::findOrFail($request->input('product_id'));

        Cart::add(
            $product->id, 
            $product->name, 
            $product->price, 
            1, 
            array()
        );
        
        return redirect()->route('listings')->with('message', 'Success!');
    }
}
