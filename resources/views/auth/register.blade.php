@extends('layouts.master')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-500 to-indigo-600">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center text-gray-800">{{ __('Register') }}</h2>
                <p class="text-sm text-center text-gray-600 mt-2">Create your account to get started!</p>

                <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="relative">
                        <i class="bx bx-user absolute inset-y-0 left-0 pl-3 text-gray-400"></i>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                               class="w-full pl-10 px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <i class="bx bx-envelope absolute inset-y-0 left-0 pl-3 text-gray-400"></i>
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                               class="w-full pl-10 px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <i class="bx bx-lock-alt absolute inset-y-0 left-0 pl-3 text-gray-400"></i>
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required
                               class="w-full pl-10 px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <i class="bx bx-lock-alt absolute inset-y-0 left-0 pl-3 text-gray-400"></i>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="w-full pl-10 px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password_confirmation') border-red-500 @enderror">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-150 ease-in-out">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-sm text-center mt-4">
                        Already registered?
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
