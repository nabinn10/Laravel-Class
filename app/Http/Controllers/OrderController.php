<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // index
    public function index()

    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request, $cartid)
    {
        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data);

        if ($data->status == 'COMPLETE') {
            $cart = Cart::find($cartid);

            if (!$cart) {
                return redirect()->route('home')->with('error', 'Cart not found');
            }

            $data = [
                'user_id' => $cart->user_id,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'price' => $cart->product->price,
                'payment_method' => "eSewa",
                'name' => $cart->user->name, // Fixed incorrect variable
                'phone' => "9866278392",
                'address' => "Kathmandu",
            ];

            Order::create($data);
            $cart->delete();

            return redirect()->route('home')->with('success', 'Order Placed Successfully');
        }

        return redirect()->route('home')->with('error', 'Invalid order status');
    }

    public function storecod(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $data = [
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'qty' => $cart->qty,
            'price' => $cart->product->price,
            'payment_method' => "Cash On Delivery",
            'name' => $cart->user->name, // Fixed incorrect variable
            'phone' => "9866278392",
            'address' => "Kathmandu",
        ];
        Order::create($data);
        $cart->delete();
        return redirect()->route('home')->with('success', 'Order Placed Successfully');
    }
    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        return back()->with('success','Order is now '.$status);
    }
}
