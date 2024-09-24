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
            <a  class="bg-red-500 cursor-pointer text-white px-3 py-1 rounded" onclick="showpopup('{{$category->id}}')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
{{-- SCript for popup --}}
<script>
    function showpopup(id){
        document.getElementById('popup').classList.remove('hidden');
        document.getElementById('popup').classList.add('flex');
        document.getElementById('dataid').value = id;
    }
    function hidePopup(){
        document.getElementById('popup').classList.remove('flex');
        document.getElementById('popup').classList.add('hidden');
    }
</script>


{{-- Popup Modal for deleting the category --}}

<div class="fixed top-0 left-0 right-0 bottom-0 bg-gray-600 bg-opacity-50 backdrop-blur-sm hidden items-center justify-center" id="popup">
    <div class="bg-white w-1/3  px-10 py-5 rounded-lg shadow-lg fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <h1 class="text-2xl font-bold text-center text-red-500">
            <i class="fas fa-exclamation-triangle"></i> <!-- Font Awesome icon added here -->
            Are you sure to delete?
        </h1>
        <div class="flex justify-center mt-5">
            <form action="{{route('category.destroy')}}" method="POST" class="">
                <input type="hidden" id="dataid" name="dataid">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-lg">Yes! Delete</button>
                <a type="button" class="bg-blue-500 text-white px-5 py-2 rounded-lg" onclick="hidePopup()">Cancel</a>
            </form>
        </div>
    </div>
</div>




{{-- End of Popup Modal --}}
@endsection
