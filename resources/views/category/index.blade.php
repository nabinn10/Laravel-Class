@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">Categories</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{route('category.create')}}" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover hover:bg-black hover:text-white">Add Category</a>
</div>

<table class="w-full mt-5">
    <tr>
        <th class="border p-2 bg-gray-200">Order</th>
        <th class="border p-2 bg-gray-200">Category Name</th>
        <th class="border p-2 bg-gray-200">Action</th>
    </tr>
    @foreach($categories as $category)

    <tr class="text-center">
        <td class="border p-2 ">{{$category->priority}}</td>
        <td class="border p-2 ">{{$category->name}}</td>
        <td class="border p-2 ">
            <a href="{{route('category.edit',$category->id)}}" class="bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
            <a href="{{route('category.destroy',$category->id)}}" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure to delete?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
