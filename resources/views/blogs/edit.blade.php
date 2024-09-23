
@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">Edit Banner</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('blogs.update' ,$blogs->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf
    <input type="text" class="w-full rounded-lg my-2 " name="priority" placeholder="Enter Priority" value="{{old('priority',$blogs->priority)}}">
        @error('priority')
        <p class="text-red-500 -mt-2">{{$message}}</p>
        @enderror
        <input type="file" name="photopath" class="w-full rounded-lg my-2">
        @error('photopath')
            <p class="text-red-500 -mt-2">{{ $message }}</p>
        @enderror
        <p>Current Picture:</p>
    <img src="{{ asset('images/blogs/'.$blogs->photopath) }}" alt="Product Image" class="w-44">
        <select name="status" id="" class="w-full rounded-lg my-2">
            <option value="show" {{ old('status', $blogs->status) == 'show' ? 'selected' : '' }}>Show</option>
            <option value="hide" {{ old('status', $blogs->status) == 'hide' ? 'selected' : '' }}>Hide</option>
        </select>
        @error('status')
            <p class="text-red-500 -mt-2">{{ $message }}</p>
        @enderror

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg" value="Update Blogs">Update Banner</button>
            <a href="{{ route('blogs.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
        </div>


    </form>



@endsection
