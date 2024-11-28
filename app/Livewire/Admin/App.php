<?php

namespace App\Livewire\Admin;
use App\Models\appointment;
use Livewire\Component;

class App extends Component
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
        dd("sasas");

        $appointment = Appointment::find($id);

    if ($appointment) {

        $appointment->status = 'Approved';
        $appointment->save();


        Prescription::create([
            'appointment_id' => $appointment->id,
            'treatment' => '',
            'medicine' => '',
        ]);

        session()->flash('message', 'Appointment approved saved successfully!');
    } else {
        session()->flash('message', 'Failed to approve appointment.');
    }

    // Refresh the list of appointments
    $this->appointments = Appointment::all();
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

        return view('livewire.admin.app', compact('appointments'));
    }
}
