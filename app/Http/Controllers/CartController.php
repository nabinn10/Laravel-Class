<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\NodeVisitor\FindingVisitor;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'qty' => 'required|numeric'
        ]);
        $data['user_id'] = Auth::id();


        // check if the product is already in the cart
        $cart = Cart::where('user_id', Auth::id())->where('product_id', $data['product_id'])->first();
        if ($cart) {
            $cart->qty = $cart->qty + $data['qty'];
            $cart->save();
            return back()->with('success', 'Product added to Cart Successfully');
        }
        Cart::create($data);
        return back()->with('success', 'Product added to Cart Successfully');
    }
    public function mycart()
    {

        // user ko id le cart ko user_id sanga match garera cart haru tanna lai
        $carts = cart::where('user_id', Auth::id())->get();

        foreach($carts as $cart)
        {
        if($cart->product->discounted_price =="")
        {
            $cart->total = $cart->product->qty * $cart->qty ;
        }
        else
        {
            $cart->total = $cart->product->discounted_price * $cart->qty;
        }
    }

        return view('mycart', compact('carts'));
    }

    public function delete($id)
    {
        Cart::find($id)->delete();
        return back()->with('success', 'Product removed from Cart Successfully');
    }
}
