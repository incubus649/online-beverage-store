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
        if (auth()->user()) {
            if (auth()->user()->is_supplier) {
                return back()->with('message', 'Orders cannot be placed for supliers!');
            }

            if (auth()->user()->is_admin) {
                return back()->with('message', 'Orders cannot be placed for admins!');
            }
        }

        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        return view('orders.create', compact('categories', 'productsAll'));
    }

    // Show orders
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->get();
        $productsAll = Product::all();

        $orders = Order::latest()->paginate(20);

        if (auth()->user()->is_supplier) {
            $orders_arr = [];

            foreach ($orders as $order) {
                foreach ($order->products->where('user_id', auth()->user()->id) as $product) {
                    array_push($orders_arr, $product->pivot->order_id);
                }
            }

            $orders = Order::whereIn('id', $orders_arr);
            $orders = $orders->paginate(20);

            return view('suppliers.orders', compact('categories', 'productsAll', 'orders'));
        }

        if (auth()->user()->is_admin) {
            return view('admins.orders', compact('categories', 'productsAll', 'orders'));
        }

        return view('users.orders', compact('categories', 'productsAll', 'orders'));
    }

    // Store order form
    public function store()
    {
        if (auth()->user()) {
            if (auth()->user()->is_supplier) {
                return back()->with('message', 'Orders cannot be placed for supliers!');
            }

            if (auth()->user()->is_admin) {
                return back()->with('message', 'Orders cannot be placed for admins!');
            }
        }

        if (Cart::isEmpty()) {
            return redirect()->back()->with('message', 'Cart is empty! Try again!');
        }

        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
        ]);

        if (auth()->user()) {
            $formFields['user_id'] = auth()->user()->id;
        }

        request()->validate([
            $city = 'city' => 'required',
            $country = 'country' => 'required',
            $street = 'street' => 'required',
            $postal_code = 'postal_code' => 'required',
        ]);

        $formFields['address'] = $country . ', ' . $city . ', ' . $street . ', ' . $postal_code;
        $formFields['subtotal'] = Cart::getSubTotal();

        $order = Order::create($formFields);

        $products = Product::all();

        foreach (Cart::getContent() as $item) {
            foreach ($products->where('id', $item->id) as $product) {

                if ($product->stock < $item->quantity) {
                    return redirect()->back()->with('message', 'Insufficient stock');
                }

                $order->products()->attach($product, ['quantity' => $item->quantity]);

                $product->stock -= $item->quantity;
                $product->save();
            }
        }

        Cart::clear();

        return view('orders.show');
    }
}
