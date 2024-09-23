@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">Products</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{route('product.create')}}" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover hover:bg-black hover:text-white">Add Product</a>
</div>


<table class="w-full mt-5 align-center text-center sm:text-sm md:text-base  lg:text-xl">
    <tr>
        <th class="border p-2 bg-gray-200">S.N.</th>
        <th class="border p-2 bg-gray-200">Picture</th>
        <th class="border p-2 bg-gray-200">Picture Name</th>
        <th class="border p-2 bg-gray-200">Description</th>
        <th class="border p-2 bg-gray-200">Price</th>
        <th class="border p-2 bg-gray-200">Discounted Price</th>
        <th class="border p-2 bg-gray-200">Stock</th>
        <th class="border p-2 bg-gray-200">Status</th>
        <th class="border p-2 bg-gray-200">Category</th>
        <th class="border p-2 bg-gray-200">Action</th>
    </tr>

        @foreach ($products as $product)
        <tr>
            <td class="border p-2">{{$loop->iteration}}</td>
        <td class="border p-2 mx-auto">
            <img src="{{ asset('images/product/' . $product->photopath) }}" alt="" class="w-16 h-16 mx-auto object-cover">
        </td>
        <td class="border p-2">{{$product->name}}</td>
        <td class="border p-2">{{$product->description}}</td>
        <td class="border p-2">{{$product->price}}</td>
        <td class="border p-2">{{$product->discounted_price}}</td>
        <td class="border p-2">{{$product->stock}}</td>
        <td class="border p-2">{{$product->status}}</td>
        <td class="border p-2">{{$product->category->name}}</td>
        <td class="border p-2">
            <a href="{{route('product.edit',$product->id)}}" class="bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
            <a href="{{route('product.destroy',$product->id)}}" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>

        @endforeach
</table>
@endsection
