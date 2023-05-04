<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartIconComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
