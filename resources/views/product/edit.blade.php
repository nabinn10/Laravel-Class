@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Product</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('product.update', $product->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf

    {{-- Category Dropdown --}}
    <select name="category_id" id="" class="w-full rounded-lg my-2">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    {{-- Product Name --}}
    <input type="text" placeholder="Enter Product Name" name="name" class="w-full rounded-lg my-2"
        value="{{ old('name', $product->name) }}">
    @error('name')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    {{-- Product Description --}}
    <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Product Description"
        class="w-full rounded-lg my-2">{{ old('description', $product->description) }}</textarea>
    @error('description')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    {{-- Price --}}
    <input type="text" placeholder="Enter Price" name="price" class="w-full rounded-lg my-2"
        value="{{ old('price', $product->price) }}">
    @error('price')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    {{-- Discounted Price --}}
    <input type="text" placeholder="Enter Discounted Price" name="discounted_price" class="w-full rounded-lg my-2"
        value="{{ old('discounted_price', $product->discounted_price) }}">
    @error('discounted_price')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    {{-- Stock --}}
    <input type="text" placeholder="Enter Stock" name="stock" class="w-full rounded-lg my-2"
        value="{{ old('stock', $product->stock) }}">
    @error('stock')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    {{-- Status Dropdown --}}
    <select name="status" id="" class="w-full rounded-lg my-2">
        <option value="show" {{ old('status', $product->status) == 'show' ? 'selected' : '' }}>Show</option>
        <option value="hide" {{ old('status', $product->status) == 'hide' ? 'selected' : '' }}>Hide</option>
    </select>
    @error('status')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    {{-- Image Upload --}}
    <input type="file" name="photopath" class="w-full rounded-lg my-2">
    @error('photopath')
        <p class="text-red-500 -mt-2">{{ $message }}</p>
    @enderror

    <p>Current Picture:</p>
    <img src="{{ asset('images/product/'.$product->photopath) }}" alt="Product Image" class="w-44">


    {{-- Submit and Cancel Buttons --}}
    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Product</button>
        <a href="{{ route('product.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
    </div>
</form>
@endsection
