<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function destroy($id){
        Cart::remove($id);
        $this->emitTo('cart-icon-component', 'refreshComponent');
        flash()->addSuccess("Item has been removed");
    }
    public function removeAll()
    {
        Cart::destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
        flash()->addSuccess("All item has been removed");
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
