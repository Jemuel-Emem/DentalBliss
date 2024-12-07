<div class="w-full mx-auto p-6 bg-white rounded-lg shadow-lg mb-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Approved Appointments</h2>

    @if ($approvedAppointments->isEmpty())
        <p class="text-gray-600">No approved appointments found.</p>
    @else
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">#</th>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-left">Phone</th>
                    <th class="border px-4 py-2 text-left">Date</th>
                    <th class="border px-4 py-2 text-left">Time</th>
                    <th class="border px-4 py-2 text-left">Reason</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvedAppointments as $index => $appointment)
                    <tr class="border-t">
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $appointment->name }}</td>
                        <td class="border px-4 py-2">{{ $appointment->phone_number }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($appointment->date_schedule)->format('F j, Y') }}</td>
                        <td class="border px-4 py-2">{{ $appointment->time_schedule }}</td>
                        <td class="border px-4 py-2">{{ $appointment->reason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
