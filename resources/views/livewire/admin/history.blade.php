<div class="p-6 bg-white shadow-md rounded-lg">

    <h2 class="text-xl font-semibold text-gray-800 mb-4">User Login Information</h2>


    @php
        $users = \App\Models\User::where('is_admin', 0)->get();
    @endphp

    @foreach ($users as $user)

        <div class="flex items-center mb-4">

            <div class="ml-4">
                <p class="text-lg font-medium text-gray-900">
                    {{ $user->name }}
                </p>
                <p class="text-sm text-gray-500">
                    {{ $user->email }}
                </p>
            </div>
        </div>


        <div class="bg-gray-100 p-4 rounded-lg mb-4">
            <p class="text-sm font-medium text-gray-700">Login Date:</p>
            <p class="text-lg text-gray-800 font-semibold">{{ now()->format('F j, Y') }}</p>
            <p class="text-sm font-medium text-gray-700">Login Time:</p>
            <p class="text-lg text-gray-800 font-semibold">{{ now()->format('g:i A') }}</p>
        </div>
    @endforeach
</div>
