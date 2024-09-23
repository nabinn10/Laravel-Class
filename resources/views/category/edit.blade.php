@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Category</h1>
<hr class="h-1 bg-red-500">
<form action="{{route('category.update',$category->id)}}" method="POST" class="mt-5">
    @csrf
    <input type="text" class="w-full rounded-lg my-2 " name="priority" placeholder="Enter Priority" value="{{$category->priority}}">
    @error('priority')
    <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror
    <input type="text" class="w-full rounded-lg my-2 " name="name" placeholder="Enter Category Name" value="{{$category->name}}">

    @error('name')
    <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror
    <div class="flex mt-4 justify-end   gap-4">
    <input type="submit" value="Update Category" class="bg-blue-600 text-white px-5 py-3 rounded-lg cursor-pointer">
    <a href="{{route('category.index')}}" class="bg-red-600 text-white px-10 py-3 rounded-lg cursor-pointer">Exit</a>
</div>

@endsection
