<?php

namespace App\Livewire\Admin;
use App\Mail\AppointmentApprovedMail;
use App\Mail\AppointmentDeclineMail;
use App\Jobs\SendAppointmentReminderJob;
use Illuminate\Support\Facades\Mail;
use App\Models\Prescription;
use App\Models\payment;
use Carbon\Carbon;
use App\Models\Appointment;
use Livewire\Component;

class Appointments extends Component
{
    public $search = '';
    public $appointments;

    public function mount()
    {

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



  $time = Carbon::parse($appointment->time_schedule)->format('H:i:s');
  $date = Carbon::parse($appointment->date_schedule);

  $mergedDateTime = $date->setTimeFromTimeString($time);

  $reminder = $mergedDateTime->subHour();

  $delayInSeconds = max(0, now()->diffInSeconds($reminder, false));
  if ($appointment->user) {
      Mail::to($appointment->user->email)->send(new AppointmentApprovedMail($appointment));

      SendAppointmentReminderJob::dispatch($appointment)->delay($delayInSeconds);

  }



  session()->flash('message', 'Appointment approved successfully!');
} else {
  session()->flash('message', 'Failed to approve appointment.');
}


$this->appointments = Appointment::all();
}


    public function decline($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->status = 'Declined';
            $appointment->save();


            if ($appointment->user) {
                Mail::to($appointment->user->email)->send(new AppointmentDeclineMail($appointment));
            }

            session()->flash('message', 'Appointment declined successfully!');
        } else {
            session()->flash('message', 'Failed to decline appointment.');
        }

        $this->appointments = Appointment::all();
    }

    public function render()
    {
        return view('livewire.admin.appointments');
    }
}
