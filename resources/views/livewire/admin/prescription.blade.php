<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Prescriptions</h2>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prescriptions as $prescription)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $prescription->appointment->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <button
                            wire:click="openModal({{ $prescription->id }})"
                            class="px-4 py-2  text-blue-500 rounded-md hover:bg-blue-700">
                            Update Prescription
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Update Prescription</h3>

                <form wire:submit.prevent="updatePrescription">
                    <div class="mb-4">
                        <label for="treatment" class="block text-sm font-semibold text-gray-700">Treatment</label>
                        <input
                            type="text"
                            id="treatment"
                            wire:model="treatment"
                            class="w-full p-2 border border-gray-300 rounded-md"
                            required
                        />
                        @error('treatment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="medicine" class="block text-sm font-semibold text-gray-700">Medicine</label>
                        <input
                            type="text"
                            id="medicine"
                            wire:model="medicine"
                            class="w-full p-2 border border-gray-300 rounded-md"
                            required
                        />
                        @error('medicine') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-2">
                        <button
                            type="button"
                            wire:click="closeModal"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Close
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
