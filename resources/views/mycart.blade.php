@extends('layouts.master')
@section('content')
    <div class="px-16">
        <div class="border-l-4 border-blue-900 pl-2">
            <h1 class="text-2xl font-bold">My Cart</h1>
            <p>Products in Cart</p>
        </div>
        <table class="w-full mt-5">
            <tr class="text-center">
                <th class="border border-gray-300 p-2">Product Image</th>
                <th class="border border-gray-300 p-2">Product Name</th>
                <th class="border border-gray-300 p-2">Quantity</th>
                <th class="border border-gray-300 p-2">Price</th>
                <th class="border border-gray-300 p-2">Total</th>
                <th class="border border-gray-300 p-2">Action</th>
            </tr>

            @foreach ($carts as $cart)
                <tr>
                    <td class="border border-gray-100 p-2"><img
                            src="{{ asset('images/product/' . $cart->product->photopath) }}" alt=""
                            class="h-16 mx-auto"></td>
                    <td class="border border-gray-100 p-2">{{ $cart->product->name }}</td>
                    <td class="border border-gray-100 p-2">{{ $cart->qty }}</td>
                    <td class="border border-gray-100 p-2">Rs.
                        @if ($cart->product->discounted_price == '')
                            {{ $cart->product->price }}
                        @else
                            {{ $cart->product->discounted_price }}
                            <span class="line-through text-xs text-red-600 block">Rs. {{ $cart->product->price }}</span>
                        @endif

                    </td>
                    <td class="border border-gray-100 p-2">Rs. {{ $cart->total }}</td>
                    <td class="border border-gray-100 p-2 text-center">
                        <a href="" class="bg-red-500 text-white  px-2 py-1  rounded-lg">Checkout</a>
                        <a href="{{route('cart.delete',$cart->id)}}" class="bg-blue-900 text-white  px-2 py-1  rounded-lg">Delete</a>
                    </td>



                </tr>
            
            @endforeach

        </table>
    </div>
@endsection
