
@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">Banners</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{route('blogs.create')}}" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover hover:bg-black hover:text-white">Add Banners</a>
</div>
<table class="w-full mt-5">
    <tr >
        <th class="border p-2 bg-gray-200">Priority</th>
        <th class="border p-2 bg-gray-200">Image</th>
        <th class="border p-2 bg-gray-200">Status</th>
        <th class="border p-2 bg-gray-200">Action</th>
    </tr>
    @foreach($blogs as $blog)
<tr class="text-center">
    <td class="border p-2">{{ $blog->priority }}</td>
    <td class="border p-2">
        <img src="{{ asset('images/blogs/' .$blog->photopath) }}" alt="Blog Image" class="w-16 h-16 mx-auto object-cover">
    </td>
    <td class="border p-2">{{ $blog->status }}</td>
    <td class="border p-2">
        <a href="{{ route('blogs.edit', $blog->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
        <a href="{{ route('blogs.destroy', $blog->id) }}" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure to delete?')">Delete</a>
    </td>
</tr>
@endforeach

</table>
@endsection
