<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Appointments</h2>

    @if (session()->has('message'))
        <div class="text-green-500 mb-4">{{ session('message') }}</div>
    @endif

     <div class="mb-4">
        <input
            type="text"
            wire:model="search"
            class="p-2 border border-gray-300 rounded-md"
            placeholder="Search by name..."
        >
        <button wire:click="searchAppointments" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Search
        </button>
    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Phone Number</th>
                <th class="py-2 px-4 border-b">Address</th>
                <th class="py-2 px-4 border-b">Time Schedule</th>
                <th class="py-2 px-4 border-b">Date Schedule</th>
                <th class="py-2 px-4 border-b">Reason</th>
                <th class="py-2 px-4 border-b">Mode of Payment</th> <!-- Added Mode of Payment -->
                <th class="py-2 px-4 border-b">Receipt</th> <!-- Added Receipt -->
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $appointment->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->phone_number }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->address }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->time_schedule }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->date_schedule->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->reason }}</td>

                    <!-- Mode of Payment Column -->
                    <td class="py-2 px-4 border-b">{{ $appointment->mop }}</td>

                    <!-- Receipt Column -->
                    <td class="py-2 px-4 border-b">

                        @if(in_array($appointment->mop, ['Gcash', 'Credit Card']) && $appointment->receipt)
                        <a href="{{ asset('storage/' . $appointment->receipt) }}" target="_blank" class="text-blue-500 hover:underline">
                            View Receipt
                        </a>

                        @else
                            No Receipt
                        @endif
                    </td>

                    <td class="py-2 px-4 border-b">{{ $appointment->status }}</td>
                    <td class="py-2 px-4 border-b flex " >
                        <button
                            wire:click="approve({{ $appointment->id }})"
                            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                            @if($appointment->status === 'Approved' || $appointment->status === 'Declined') disabled @endif
                        >
                            Approve
                        </button>

                        <button
                            wire:click="decline({{ $appointment->id }})"
                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                            @if($appointment->status === 'Approved' || $appointment->status === 'Declined') disabled @endif
                        >
                            Decline
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
