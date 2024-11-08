<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Appointments</h2>

    @if (session()->has('message'))
        <div class="text-green-500 mb-4">{{ session('message') }}</div>
    @endif

    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Phone Number</th>
                <th class="py-2 px-4 border-b">Address</th>
                <th class="py-2 px-4 border-b">Date Schedule</th>
                <th class="py-2 px-4 border-b">Reason</th>
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
                    <td class="py-2 px-4 border-b">{{ $appointment->date_schedule->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->reason }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->status }}</td>
                    <td class="py-2 px-4 border-b">

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
