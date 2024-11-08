<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $appointmentsCount;
    public $usersCount;
    public $schedulesCount;

    public function mount()
    {
        // Count the number of appointments with status 'approved'
        $this->appointmentsCount = Appointment::where('status', 'approved')->count();

        // Count the total number of users
        $this->usersCount = User::count();

        // Count the number of schedules (appointments) that are approved
        $this->schedulesCount = Appointment::where('status', 'approved')->count();
    }

    public function render()
    {
        return view('livewire.admin.index');
    }
}
