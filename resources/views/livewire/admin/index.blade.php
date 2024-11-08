<div class="grid grid-cols-3 gap-6 p-6 md:grid-cols-3">
    <!-- Appointments Card -->
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between">
            <div class="text-lg font-semibold text-gray-800">Appointments</div>
            <div class="text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-8 4h8m-4 8a6 6 0 100-12 6 6 0 000 12zm6 2H6" />
                </svg>
            </div>
        </div>
        <div class="mt-4 text-3xl font-bold text-gray-900">
            {{ $appointmentsCount }}
        </div>
        <p class="mt-2 text-sm text-gray-500">Total Appointments</p>
    </div>

    <!-- Schedules Card -->
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between">
            <div class="text-lg font-semibold text-gray-800">Schedules</div>
            <div class="text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16m8-16v16m8-16v16m-8-6h8m0-6h-8m-8 6h8m0 6H4" />
                </svg>
            </div>
        </div>
        <div class="mt-4 text-3xl font-bold text-gray-900">
            {{ $schedulesCount }}
        </div>
        <p class="mt-2 text-sm text-gray-500">Total Schedules</p>
    </div>

    <!-- Users Card -->
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between">
            <div class="text-lg font-semibold text-gray-800">Users</div>
            <div class="text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14c4.418 0 8 3.582 8 8H0c0-4.418 3.582-8 8-8m8-6a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 text-3xl font-bold text-gray-900">
            {{ $usersCount }}
        </div>
        <p class="mt-2 text-sm text-gray-500">Total Users</p>
    </div>
</div>
