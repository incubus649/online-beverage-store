<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Symfony\Contracts\Service\Attribute\Required;

class OrderController extends Controller
{

    // Show order form
    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        return view('orders.create', compact('categories', 'productsAll'));
    }

    // Store order form
    public function store()
    {
        // Validate if there are products in cart
        if (Cart::isEmpty()) {
            return redirect()->back()->with('message', 'Cart is empty! Try again!');
        }


        if (!auth()->user()) {
            $formFields = request()->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
            ]);
        } else {
            $formFields['name'] = auth()->user()->name;
            $formFields['email'] = auth()->user()->email;
        }

        request()->validate([
            $city = 'city' => 'required',
            $country = 'country' => 'required',
            $street = 'street' => 'required',
            $postal_code = 'postal_code' => 'required',
        ]);

        $formFields['address'] = $country . ', ' . $city . ', ' . $street . ', ' . $postal_code;

        $order = Order::create($formFields);

        $products = Product::all();

        foreach (Cart::getContent() as $item) {
            foreach ($products->where('id', $item->id) as $product) {
                // Validate if the requested quantity is available in stock
                if ($product->stock < $item->quantity) {
                    // Handle insufficient stock error
                    return redirect()->back()->with('message', 'Insufficient stock');
                }

                $order->products()->attach($product, ['quantity' => $item->quantity]);

                // Update and save the stock value
                $product->stock -= $item->quantity;
                $product->save();
            }
        }

        Cart::clear();

        return view('orders.show');
    }
}
