<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Payments Table</h2>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Payment ID</th>
                <th class="px-4 py-2 border">User</th>
                <th class="px-4 py-2 border">Amount</th>


                <th class="px-4 py-2 border">Method</th>
                <th class="px-4 py-2 border">Receipt</th>
                <th class="px-4 py-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td class="px-4 py-2 border">{{ $payment->id }}</td>
                    <td class="px-4 py-2 border">{{ $payment->user->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ number_format($payment->amount, 2) }}</td>


                    <td class="px-4 py-2 border">{{ $payment->method }}</td>
                    <td class="px-4 py-2 border">
                        @if($payment->receipt)
                            <a href="{{ asset('storage/' . $payment->receipt) }}" target="_blank" class="text-blue-500 hover:text-blue-700">View Receipt</a>
                        @else
                            <span class="text-gray-500">No Receipt</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        <button wire:click="openModal({{ $payment->id }})" class="text-blue-500 hover:text-blue-700">Edit Payment</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-4 py-2 border text-center">No payments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    @if($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-md w-96">
                <h3 class="text-xl font-semibold mb-4">Edit Payment</h3>

                <form wire:submit.prevent="updatePayment">
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <input type="text" id="amount" wire:model="amount" class="w-full border-gray-300 rounded-md" />
                    </div>




                    <div class="flex justify-between">
                        <button type="button" wire:click="closeModal" class="bg-gray-500 text-white py-2 px-4 rounded-md">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
