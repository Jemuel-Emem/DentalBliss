<?php

namespace App\Livewire\User;

use App\Models\appointment as Appointments;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Appointment extends Component
{
    public $name;
    public $phone_number;
    public $address;
    public $date_schedule;
    public $reason;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'date_schedule' => 'required|date',
        'reason' => 'required|string|max:500',
    ];

    public function submit()
    {

        $this->validate();


        Appointments::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'date_schedule' => $this->date_schedule,
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
