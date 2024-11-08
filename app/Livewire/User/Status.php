<?php

namespace App\Livewire\User;

use App\Models\Appointment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{
    public $appointments;

    public function mount()
    {

        $this->appointments = Appointment::where('user_id', Auth::id())
                                         ->orderBy('date_schedule', 'desc')
                                         ->get();
    }

    public function render()
    {
        return view('livewire.user.status', [
            'appointments' => $this->appointments,
        ]);
    }
}
