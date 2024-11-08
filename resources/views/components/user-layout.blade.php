<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dentabliss Dental Care</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @wireUiScripts --}}
    <style>

        .bg-green-light {
            background-color: #F0FFF4; /* Light green */
        }
    </style>
</head>
<body class="bg-green-light">
    @livewireScripts

    <div class="justify-center w-full mx-auto bg-green-200">
        <div x-data="{ open: false }" class="flex flex-col w-full px-8 py-2 mx-auto md:px-12 md:items-center md:justify-between md:flex-row lg:px-32 max-w-7xl">
          <div class="flex flex-row items-center justify-between text-black">
            <a class="inline-flex items-center gap-3 text-xl font-bold tracking-tight text-black" href="/dashboard">
              <img src="{{ asset('images/dental-floss.png') }}" class="h-8 rounded-full" alt="Flowbite Logo" />
              <span class="text-red-600 font-bold">Dentabliss Dental Care</span>
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
              <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <nav :class="{'flex': open, 'hidden': !open}" class="flex-col items-center flex-grow hidden gap-3 p-4 px-5 text-sm font-medium text-gray-500 md:px-0 md:pb-0 md:flex md:justify-start md:flex-row lg:p-0 md:mt-0">
            <a class="hover:text-white focus:outline-none focus:text-gray-500 md:ml-auto text-gray-500" href="{{route('appointment')}}">Appointment
            </a>
            <a class="hover:text-black focus:outline-none focus:text-gray-500 md:mr-auto" href="{{route('statuss')}}">Appointment Status
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-700">Logout</button>
            </form>
          </nav>
        </div>
      </div>

    <div>
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
