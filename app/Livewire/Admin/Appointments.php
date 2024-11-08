<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Appointments extends Component
{
    public $appointments;

    public function mount()
    {

        $this->appointments = Appointment::all();
    }

    public function approve($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->status = 'Approved';
            if ($appointment->save()) {
                session()->flash('message', 'Appointment approved successfully!');
            } else {
                session()->flash('message', 'Failed to approve appointment.');
            }


            $this->appointments = Appointment::all();
        }
    }

    public function decline($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->status = 'Declined';
            if ($appointment->save()) {
                session()->flash('message', 'Appointment declined successfully!');
            } else {
                session()->flash('message', 'Failed to decline appointment.');
            }


            $this->appointments = Appointment::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.appointments');
    }
}
