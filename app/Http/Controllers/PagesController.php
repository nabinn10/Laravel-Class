<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'Show')->latest()->limit(4)->get();
        return view('welcome', compact('products'));
    }

    public function viewproduct($id)
    {
        $products = Product::find($id);
        $relatedproducts = Product::where('status', 'Show')->where('category_id', $products->category->id)->where('id', '!=', $id)->limit(4)->get();
        return view('viewproduct', compact('products', 'relatedproducts'));
    }

    public function categoryproduct($id)
    {
        $category = Category::find($id);
        $products = Product::where('status', 'Show')->where('category_id', $id)->get();
        return view('categoryproduct', compact('products', 'category'));
    }

    //checkout function
     public function checkout($cartid)
    {
        // find cart id
        $cart = Cart::find($cartid);
    //   compact total price
        if($cart->product->discounted_price == '')
        {
            $cart_total = $cart->product->price * $cart->qty;
        }
        else
        {
            $cart_total = $cart->product->discounted_price * $cart->qty;
        }

            $cart->tax = $cart_total * 0.13;

        // compact cart
        return view('checkout', compact('cart', 'cart_total'));
    }
}
