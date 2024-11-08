<div class="p-8 max-w-7xl mx-auto bg-white rounded-lg shadow-xl">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Your Appointments</h2>

    @if($appointments->isEmpty())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">
            <p class="font-medium text-lg">No appointments found</p>
        </div>
    @else
        <table class="w-full bg-gray-50 rounded-lg shadow-sm">
            <thead>
                <tr>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold border-b">Name</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold border-b">Reason</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold border-b">Scheduled Date</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-semibold border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="py-4 px-6 text-gray-800">{{ $appointment->name }}</td>
                        <td class="py-4 px-6 text-gray-800">{{ $appointment->reason }}</td>
                        <td class="py-4 px-6 text-gray-800">{{ $appointment->date_schedule->format('Y-m-d') }}</td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 inline-block text-sm font-medium rounded-full
                            @if($appointment->status == 'Approved') bg-green-100 text-green-600
                            @elseif($appointment->status == 'Declined') bg-red-100 text-red-600
                            @else bg-yellow-100 text-yellow-600 @endif">
                                {{ $appointment->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
