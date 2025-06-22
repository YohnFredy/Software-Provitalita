<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{

    #[On('update-cart')]
    public function getTotalQuantityProperty()
    {
        return array_sum(array_column(session('cart', []), 'quantity'));
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
