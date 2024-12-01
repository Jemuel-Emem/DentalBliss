<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dental Bliss</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-cover bg-center bg-no-repeat"
      style="background-image: url('{{ asset('images/bg1.jpg') }}');">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-opacity-75 bg-gray-900">
        <!-- Header -->
        <div class="text-center mb-6">
            <a href="/" wire:navigate>
                <img src="{{ asset('images/dental-floss.png') }}" alt="Logo"
                     class="w-20 h-20 mx-auto rounded-full">
                <span class="block mt-2 text-4xl font-extrabold text-white">
                    Dental Bliss
                </span>
            </a>
        </div>


        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="text-center text-2xl font-semibold text-gray-800 mb-4">
                Welcome Back
            </h2>
            <p class="text-center text-gray-600 mb-6">
                Your journey to a healthier smile starts here.
            </p>

            <div class="flex justify-center">
                <a href="{{route('login')}}" class="bg-blue-500 text-white w-32 rounded-md text-center">Login</a>
                <a href="{{route('register')}}" class="bg-cyan-500 text-white w-32 rounded-md text-center">Register</a>
            </div>

        </div>
    </div>
</body>
</html>
