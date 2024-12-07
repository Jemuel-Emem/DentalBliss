<?php

namespace App\Livewire\Admin;

use App\Jobs\SendAppointmentReminderJob;
use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;

class Approved extends Component
{
    public $approvedAppointments;

    public function mount()
    {
        $this->approvedAppointments = Appointment::where('status', 'Approved')->get();

        foreach ($this->approvedAppointments as $appointment) {

            try {
                $appointmentTime = Carbon::createFromFormat('Y-m-d g:i A', $appointment->date_schedule . ' ' . $appointment->time_schedule);
                $reminderTime = $appointmentTime->subHour();

                if ($reminderTime->isFuture()) {
                    SendAppointmentReminderJob::dispatch($appointment)->delay($reminderTime);
                }
            } catch (\Exception $e) {

            }
        }
    }

    public function render()
    {
        return view('livewire.admin.approved', [
            'approvedAppointments' => $this->approvedAppointments,
        ]);
    }
}
