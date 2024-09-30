<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @include('layouts.alert')
    <div class="flex">
        <nav class="w-56 h-screen bg-gray-100 shadow-lg">
            <img src="{{ asset('images/logo1.png') }}" alt=""
                style="blend-mode:screen; background-color: rgba(75, 85, 99, 0.5); "
                class="w-40 mx-auto mt-5 rounded-md">
            <ul class="mt-5">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b">
                        <i class='bx bx-home-alt'></i>
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs.index') }}"
                        class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b">
                        <i class='bx bxs-book'></i>
                        <span class="ml-2">Banners</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('category.index') }}"
                        class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b">
                        <i class='bx bx-category'></i>
                        <span class="ml-2">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}"
                        class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b">
                        <i class='bx bx-box'></i>
                        <span class="ml-2">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('order.index')}}"
                        class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b">
                        <i class='bx bx-cart'></i>
                        <span class="ml-2">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b">
                        <i class='bx bx-user'></i>
                        <span class="ml-2">Users</span>
                    </a>
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b w-full text-left">
                            <i class='bx bx-log-out'></i> <span class="ml-2">Logout</span></button>

                    </form>
                </li>
            </ul>
        </nav>
        <div class="p-4 flex-1">
            @yield('content')
        </div>
    </div>
</body>

</html>
