<?php

namespace App\Livewire\User;

use App\Models\appointment as Appointments;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Appointment extends Component
{
    use WithFileUploads;

    public $name;
    public $phone_number;
    public $address;
    public $date_schedule;
    public $time_schedule;
    public $reason;
    public $mop;
    public $receipt;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'date_schedule' => 'required|date',
        'time_schedule' => 'required',
        'reason' => 'required|string|max:500',

    ];

    public function submit()
    {

        $this->validate();


        $existingAppointment = Appointments::where('date_schedule', $this->date_schedule)
            ->where('time_schedule', $this->time_schedule)
            ->exists();

        if ($existingAppointment) {
            flash()->info('An appointment already exists for the selected date and time. Please choose a different slot.');

            return;
        }

        Appointments::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'date_schedule' => $this->date_schedule,
            'time_schedule' => $this->time_schedule,
            'reason' => $this->reason,
            'status' => 'processing',
        ]);


        $this->reset();

        flash()->success('Appointment created successfully!');

    }

    public function render()
    {
        return view('livewire.user.appointment');
    }
}
