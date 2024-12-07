<?php

namespace App\Jobs;

use App\Mail\AppointmentReminderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAppointmentReminderJob implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    public $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function handle()
    {
        Mail::to($this->appointment->user->email)->send(new AppointmentReminderMail($this->appointment));
    }
}
