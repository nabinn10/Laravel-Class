<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LICT Ecommerce</title>
    <link rel="icon" href="{{ asset('images/lictlogo.png') }}" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('layouts.alert')
    <div class="flex justify-between items-center px-16 py-2 bg-blue-900 text-white">
        <p>
            <i class="fab fa-facebook"></i> |
            <i class="fab fa-instagram"></i> |
            <i class="fab fa-tiktok"></i> |
            <i class="fab fa-youtube"></i>
        </p>
        <p>Call Us: +977 986-6278392</p>
    </div>

    <nav class="shadow bg-white px-16 py-4 flex justify-between items-center mb-10 sticky top-0 z-40">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-16">
        <form action="{{route('search')}}" method="GET">
            <input type="search" class="border border-gray-300 rounded-lg px-3 py-2" placeholder="Search"
                name="search" value="{{request()->query('search')}}">
            <button type="submit" class="bg-blue-900 text-white rounded-lg px-4 py-2">Search</button>
        </form>
        <div class="flex gap-4 items-center">
            <a href="/" class="hover:text-blue-900">Home</a>
            @php
                $categories = App\Models\Category::orderBy('priority')->get();
            @endphp
            @foreach ($categories as $category)
                <a href="{{ route('categoryproduct', $category->id) }}"
                    class="hover:text-blue-900">{{ $category->name }}</a>
            @endforeach

            @auth
            <div class="group relative">
                <i class="fas fa-user text-xl bg-gray-200 p-2 rounded-full cursor-pointer"></i>
                <div class="absolute hidden group-hover:block top-8 -right-10 bg-white shadow w-32 rounded-md border">
                    <a href="{{route('mycart')}}" class="block py-2 hover:bg-gray-200 p-4 rounded-md">
                        <i class="fas fa-shopping-cart text-opacity-50"></i> My Cart
                    </a>
                    <a href="" class="block py-2 hover:bg-gray-200 p-4 rounded-md">
                        <i class="fas fa-box text-opacity-50"></i> My Orders
                    </a>
                    <a href="" class="block py-2 hover:bg-gray-200 p-4 rounded-md">
                        <i class="fas fa-user-circle text-opacity-50"></i> My Profile
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 hover:bg-gray-200 p-4 rounded-md">
                            <i class="fas fa-sign-out-alt text-opacity-50"></i> Logout
                        </button>
                    </form>
                </div>
            </div>


            @else
                <a href="{{ route('login') }}" class="hover:text-blue-900">Login</a>
            @endauth
        </div>
    </nav>

    @yield('content')

    <footer class="bg-blue-900 text-white px-16 py-4 mt-10">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <h1 class="text-2xl">LICT Ecommerce</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta necessitatibus, non consequatur
                    consequuntur voluptatum quibusdam dolorum odio voluptatibus.</p>
            </div>
            <div>
                <h1 class="text-2xl">Quick Links</h1>
                <ul>
                    <li>Home</li>
                    <li>Beer</li>
                    <li>Wine</li>
                    <li>Whisky</li>
                    <li>Rum</li>
                </ul>
            </div>
            <div>
                <h1 class="text-2xl">Contact Us</h1>
                <p>Address: Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p>Phone: +977 986-6278392</p>
                <p>Email: info@lict.com</p>
            </div>
        </div>
    </footer>

</body>

</html>
