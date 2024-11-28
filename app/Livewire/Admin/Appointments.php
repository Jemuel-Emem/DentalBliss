<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Appointments extends Component
{
    public $search = '';
    public $appointments;

    public function mount()
    {

        $this->appointments = Appointment::all();
    }
    public function searchAppointments()
    {
        $this->appointments = Appointment::where('name', 'like', '%' . $this->search . '%')->get();
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
        $appointments = Appointment::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.admin.appointments', compact('appointments'));
    }
}
