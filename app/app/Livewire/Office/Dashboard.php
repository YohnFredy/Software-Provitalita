<?php

namespace App\Livewire\Office;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{

    public $user;
    public $direct = 0, $totalDirect = 0, $right = 0, $left = 0;

    public function mount()
    {
        $this->user = Auth::user();

        $unilevel = $this->user->unilevelTotal;
        $binary = $this->user->binaryTotal;
    
        if ($unilevel) {
            $this->direct = $unilevel->direct_affiliates;
            $this->totalDirect = $unilevel->total_affiliates;
        }
    
        if ($binary) {
            $this->left = $binary->left_affiliates;
            $this->right = $binary->right_affiliates;
        }
    }


    #[Layout('components.layouts.office')]
    public function render()
    {
        return view('livewire.office.dashboard');
    }
}
