<?php

namespace App\Livewire\Admin;
use App\Mail\AppointmentApprovedMail;
use App\Mail\AppointmentDeclineMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Prescription;
use App\Models\payment;
use App\Models\Appointment;
use Livewire\Component;

class Appointments extends Component
{
    public $search = '';
    public $appointments;

    public function mount()
    {
        // Initialize appointments on component mount
        $this->appointments = Appointment::all();
    }

    public function updatedSearch()
    {
        $this->appointments = Appointment::where('name', 'like', '%' . $this->search . '%')->get();
    }
public function searchAppointments(){

}

    public function approve($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->status = 'Approved';
            $appointment->save();

            Prescription::create([
                'appointment_id' => $appointment->id,
                'treatment' => '',
                'medicine' => '',
            ]);

            payment::create([
                'user_id' => $appointment->user_id,
                'appointment_id' => $appointment->id,
                'status' => 'pending',
                'payment_date' => null,
            ]);


            if ($appointment->user) {
                Mail::to($appointment->user->email)->send(new AppointmentApprovedMail($appointment));
            }

            session()->flash('message', 'Appointment approved successfully!');
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
            $appointment->save();

            // Send email if appointment has a user
            if ($appointment->user) {
                Mail::to($appointment->user->email)->send(new AppointmentDeclineMail($appointment));
            }

            session()->flash('message', 'Appointment declined successfully!');
        } else {
            session()->flash('message', 'Failed to decline appointment.');
        }

        // Refresh the list of appointments
        $this->appointments = Appointment::all();
    }

    public function render()
    {
        return view('livewire.admin.appointments');
    }
}
