<?php

namespace App\Livewire\Office;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{

    public $user;

    public function mount(){
        $this->user = Auth::user();
    }


    #[Layout('components.layouts.office')]
    public function render()
    {
        return view('livewire.office.dashboard');
    }
}
