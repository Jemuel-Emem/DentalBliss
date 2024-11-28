<?php

namespace App\Livewire\User;

use App\Models\Prescription;
use App\Models\Appointment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{

    public $appointments;
    public $prescriptions = [];
    public $selectedAppointmentId;

    public function mount()
    {
        // Fetch appointments for the logged-in user
        $this->appointments = Appointment::where('user_id', Auth::id())
                                         ->orderBy('date_schedule', 'desc')
                                         ->get();
    }

    // Function to handle showing prescriptions for a specific appointment
    public function viewPrescriptions($appointmentId)
    {
        // Fetch prescriptions related to the specific appointment_id
        $this->prescriptions = Prescription::where('appointment_id', $appointmentId)->get(); // Using get() returns a collection
        $this->selectedAppointmentId = $appointmentId; // Set selected appointment ID
    }
    public function render()
    {
        return view('livewire.user.status', [
            'appointments' => $this->appointments,
        ]);
    }
}
