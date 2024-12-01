<div class="w-full sm:w-8/12 mx-auto p-6 sm:p-8 bg-white rounded-lg shadow-lg mb-4 mt-4 h-fit">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Appointment Form</h2>

    <div class="mb-6">
        <h3 class="text-xl font-medium text-gray-700 mb-4">Schedule Your Appointment</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Name">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" wire:model="phone_number" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Phone Number">
                @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" wire:model="address" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Address">
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700">Time of Schedule</label>
                <input type="time" wire:model="time_schedule" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                @error('time_schedule') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700">Date of Schedule</label>
                <input type="date" wire:model="date_schedule" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                @error('date_schedule') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Reason for Appointment</label>
                <textarea wire:model="reason" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Describe the reason for your appointment"></textarea>
                @error('reason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            {{-- <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Mode of Payment</label>
                <p class="text-sm text-gray-500 mb-3">Please select your preferred mode of payment and upload a receipt if required.</p>

    <div class="flex space-x-4 mb-4">

        <div class="flex items-center">
            <img src="{{ asset('images/gcash.jpg') }}" alt="Gcash" class="w-16 h-16 rounded-md shadow-md">
        </div>
        <div class="flex items-center">
            <img src="{{ asset('images/bdo.jpg') }}" alt="BDO" class="w-16 h-16 rounded-md shadow-md">
        </div>
    </div>
                <select wire:model="mop" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                    <option value="Walk-in">Walk-in</option>
                    <option value="Gcash">Gcash</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
                @error('mop') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            <div class="sm:col-span-2" x-data="{ show: false }" x-init="$watch('$wire.mop', value => show = ['Gcash', 'Credit Card'].includes(value))">
                <label class="block text-sm font-medium text-gray-700">Receipt (Optional for Gcash/Credit Card)</label>
                <input type="file" wire:model="receipt" class="w-full mt-1 p-2 border border-gray-300 rounded-md" x-show="show">
                @error('receipt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
    </div> --}}

    <div class="flex justify-end mt-6">
        <button wire:click="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Submit</button>
    </div>

    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</div>
