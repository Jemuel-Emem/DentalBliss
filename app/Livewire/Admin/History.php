<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public $user;
    public $currentDateTime;

    public function mount()
    {

        $this->user = Auth::user();
        $this->currentDateTime = now();
    }

    public function render()
    {
        return view('livewire.admin.history', [
            'user' => $this->user,
            'currentDateTime' => $this->currentDateTime,
        ]);
    }
}
