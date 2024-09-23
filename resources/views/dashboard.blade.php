@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Dashboard Header -->
    <h1 class="text-3xl font-extrabold text-blue-900 mb-4">Dashboard</h1>
    <hr class="h-1 bg-red-500 mb-6">

    <!-- Dashboard Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Categories Card -->
        <div class="bg-blue-100 p-5 shadow-md rounded-lg flex items-center">
            <i class="bx bx-category-alt text-4xl text-blue-900 mr-4"></i>
            <div>
                <h2 class="text-xl font-semibold text-blue-900">Categories</h2>
                <p class="text-gray-700">Total Categories: {{$categories}}</p>
            </div>
        </div>

        <!-- Banners Card -->
        <div class="bg-red-100 p-5 shadow-md rounded-lg flex items-center">
            <i class="bx bx-image text-4xl text-blue-900 mr-4"></i>
            <div>
                <h2 class="text-xl font-semibold text-blue-900">Banners</h2>
                <p class="text-gray-700">Total Banners: {{$blogs}}</p>
            </div>
        </div>

        <!-- Products Card -->
        <div class="bg-green-100 p-5 shadow-md rounded-lg flex items-center">
            <i class="bx bx-box text-4xl text-blue-900 mr-4"></i>
            <div>
                <h2 class="text-xl font-semibold text-blue-900">Products</h2>
                <p class="text-gray-700">Total Products: {{$products}}</p>
            </div>
        </div>

        <!-- Users Card -->
        <div class="bg-yellow-100 p-5 shadow-md rounded-lg flex items-center">
            <i class="bx bx-user text-4xl text-blue-900 mr-4"></i>
            <div>
                <h2 class="text-xl font-semibold text-blue-900">Users</h2>
                <p class="text-gray-700">Total Users: 5</p>
            </div>
        </div>

        <!-- Pending Orders Card -->
        <div class="bg-purple-100 p-5 shadow-md rounded-lg flex items-center">
            <i class="bx bx-time-five text-4xl text-blue-900 mr-4"></i>
            <div>
                <h2 class="text-xl font-semibold text-blue-900">Pending Orders</h2>
                <p class="text-gray-700">Total Orders: 5</p>
            </div>
        </div>

        <!-- Processing Orders Card -->
        <div class="bg-pink-100 p-5 shadow-md rounded-lg flex items-center">
            <i class="bx bx-loader text-4xl text-blue-900 mr-4"></i>
            <div>
                <h2 class="text-xl font-semibold text-blue-900">Processing Orders</h2>
                <p class="text-gray-700">Processing Orders: 5</p>
            </div>
        </div>

        <!-- Completed Orders Card -->
        <div class="bg-[#A8DADC] p-5 shadow-md rounded-lg flex items-center">
            <i class="bx bx-check-circle text-4xl text-blue-900 mr-4"></i>
            <div>
                <h2 class="text-xl font-semibold text-blue-900">Completed Orders</h2>
                <p class="text-gray-700">Completed Orders: 5</p>
            </div>
        </div>
    </div>
</div>
@endsection
