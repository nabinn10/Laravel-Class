@extends('layouts.master')
@section('content')
    <div class="mt-5 grid grid-cols-4 gap-6 px-16">
        <div>
            <img src="{{ asset('images/product/' . $products->photopath) }}" alt=""
                class="h-72 w-full object-cover rounded-lg">
        </div>
        <div class="col-span-2 border-x px-4">

            <h2 class="font-bold text-4xl">{{ $products->name }}</h2>
            <p class="text-2xl text-gray-600 my-2">{{ $products->description }}</p>
            <p class="text-blue-900 font-bold text-4xl">
                @if ($products->discounted_price != '')
                    Rs. {{ $products->discounted_price }}
                    <span class="line-through font-thin text-sm text-red-600">
                        Rs. {{ $products->price }}
                    </span>
                @else
                    Rs. {{ $products->price }}
                @endif
            </p>
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$products->id}}">
                <div class="flex mt-10">
                    <a class="bg-gray-200 px-4 py-2 cursor-pointer" id="dec" onclick="return dec()">-</a>
                    <input type="text" value="1" class="w-12 text-center border-nonebg-gray-100" id="qty" name="qty"
                        readonly>
                     <a class="bg-gray-200 px-4 py-2 cursor-pointer" id="dec" onclick="return inc()">+</a>
                </div>
                <p class=" text-gray-400 my-5 ">Stock: {{ $products->stock }}</p>


                <div class="flex">
                    <button
                        class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 transition mr-5 flex items-center">
                        <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                    </button>

                    <!-- Buy Now Button -->
                    <button
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500 transition flex items-center">
                        <i class="fas fa-box mr-2"></i>Buy Now
                    </button>
            </form>
        </div>
    </div>
    <div class="text-gray-500 px-2 space-y-2">
        <p class="mb-2 flex items-center">
            <i class="fas fa-truck mr-2"></i> Delivery within 5 Days
        </p>
        <p class="mb-2 flex items-center">
            <i class="fas fa-undo-alt mr-2"></i> 7 Days Return Policy
        </p>
        <p class="mb-2 flex items-center">
            <i class="fas fa-money-bill-wave mr-2"></i> Cash On Delivery Available
        </p>
        <p class="mb-2 flex items-center">
            <i class="fas fa-certificate mr-2"></i> Warranty Available
        </p>

    </div>


    </div>
    <div class="px-16">
        <div class="border-l-4 border-blue-900 pl-2 w-full mt-5">
            <h1 class="text-2xl font-bold">Related Product</h1>
            <p>Our Related Product</p>
        </div>
        <div class="grid grid-cols-4 gap-10 mt-5">
            @foreach ($relatedproducts as $product)
                <a href="{{ route('viewproduct', $product->id) }}">
                    <div class="border rounded-lg bg-gray-100 hover:-translate-y-2 duration-300 shadow hover:shadow-lg">
                        <img src="{{ asset('images/product/' . $product->photopath) }}" alt=""
                            class="h-64 w-full object-cover rounded-t-lg">
                        <div class="p-4">
                            <h1 class="text-lg font-bold">{{ $product->name }}</h1>
                            <p class="text-gray-700 text-sm mb-2 line-clamp-3">
                                {{ Str::limit($product->description, 50) }}
                            </p>
                            @if ($product->discounted_price != '')
                                <p class="text-blue-900 font-bold text-lg">
                                    Rs. {{ $product->discounted_price }}
                                    <span class="line-through font-thin text-sm text-red-600">Rs.
                                        {{ $product->price }}</span>
                                </p>
                            @else
                                <p class="text-blue-900 font-bold text-lg">
                                    Rs. {{ $product->price }}
                                </p>
                            @endif


                        </div>
                    </div>
                </a>
            @endforeach

        </div>


    </div>
@endsection
<script>
    function inc() {
        var qty = document.getElementById('qty').value;
        var stock = {{ $products->stock }};

        if (qty < stock) {
            qty++;
            document.getElementById('qty').value = qty;
        }
        return false;
    }

    function dec() {
        var qty = document.getElementById('qty').value;
        if (qty > 1) {
            qty--;
            document.getElementById('qty').value = qty;
        }
        return false;
    }
</script>
