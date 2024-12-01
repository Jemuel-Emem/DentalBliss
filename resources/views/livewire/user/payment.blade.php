<div>
    <div class="rounded-lg mt-4">
        <table class="min-w-full bg-white text-gray-800">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="py-3 px-4 border-b font-medium">Payment Amount</th>


                    <th class="py-3 px-4 border-b font-medium">Method</th>
                    <th class="py-3 px-4 border-b font-medium">Reference Number</th>
                    <th class="py-3 px-4 border-b font-medium">Receipt</th>
                    <th class="py-3 px-4 border-b font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4 border-b">{{ $payment->amount }}</td>


                        <td class="py-3 px-4 border-b">{{ $payment->method }}</td>
                        <td class="py-3 px-4 border-b">{{ $payment->reference_number }}</td>
                        <td class="py-3 px-4 border-b">
                            @if($payment->receipt)
                                <a href="{{ asset('storage/' . $payment->receipt) }}" target="_blank" class="text-blue-500 hover:text-blue-700">View Receipt</a>
                            @else
                                <span class="text-gray-500">No Receipt</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b">
                            <button wire:click="openModal({{ $payment->id }})" class="text-blue-500 hover:text-blue-700">View Payment</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-md w-96">
            <h3 class="text-xl font-semibold mb-4">Edit Payment</h3>

            <form wire:submit.prevent="updatePayment">
                <div class="mb-4">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <input type="text" id="amount" wire:model="amount" class="w-full border-gray-300 rounded-md" />
                </div>

                <div class="mb-4">
                    <label for="method" class="block text-sm font-medium text-gray-700">Method</label>
                    <select id="method" wire:model="method" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                        <option value="Walk-in">Walk-in</option>
                        <option value="Gcash">Gcash</option>
                        <option value="Credit Card">Credit Card</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="reference_number" class="block text-sm font-medium text-gray-700">Reference Number</label>
                    <input type="text" id="reference_number" wire:model="reference_number" class="w-full border-gray-300 rounded-md" />
                </div>
                <div class="flex space-x-4">
                    <a href="{{ asset('images/bdo.jpg') }}" target="_blank">
                        <img src="{{ asset('images/bdo.jpg') }}" alt="BDO" class="w-16 h-16 rounded-md shadow-md cursor-pointer hover:opacity-80">
                    </a>
                    <a href="{{ asset('images/gcash.jpg') }}" target="_blank">
                        <img src="{{ asset('images/gcash.jpg') }}" alt="Gcash" class="w-16 h-16 rounded-md shadow-md cursor-pointer hover:opacity-80">
                    </a>
                </div>

                <div class="mb-4 mt-2">
                    <label for="receipt" class="block text-sm font-medium text-gray-700">Receipt</label>
                    <input type="file" id="receipt" wire:model="receipt" class="w-full border-gray-300 rounded-md" />
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
