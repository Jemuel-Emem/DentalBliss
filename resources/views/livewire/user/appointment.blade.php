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
                <select wire:model="time_schedule" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                    <option value="" disabled selected>Select Time</option>
                    <option value="7:00 AM">7:00 AM</option>
                    <option value="8:00 AM">8:00 AM</option>
                    <option value="9:00 AM">9:00 AM</option>
                    <option value="10:00 AM">10:00 AM</option>
                    <option value="11:00 AM">11:00 AM</option>
                    <option value="1:00 PM">1:00 PM</option>
                    <option value="2:00 PM">2:00 PM</option>
                    <option value="3:00 PM">3:00 PM</option>
                    <option value="4:00 PM">4:00 PM</option>
                    <option value="5:00 PM">5:00 PM</option>
                    <option value="5:40 PM">5:40 PM</option>
                    <option value="6:00 PM">6:00 PM</option>
                </select>
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




    <div class="flex justify-end mt-6">
        <button wire:click="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Submit</button>
    </div>

    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</div>
