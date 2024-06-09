<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class ShoppingCart extends Component
{
    public $products;
    public $subtotal;
    public $shippingFee;
    public $total;

    protected $listeners = ['updateOrderSummary'];

    public function mount()
    {
        $this->products = Cart::all();
        $this->updateOrderSummary();
    }

    public function increaseQuantity($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity += 1;
        $cartItem->save();

        $this->updateOrderSummary();
    }

    public function decreaseQuantity($id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }

        $this->updateOrderSummary();
    }

    public function updateOrderSummary()
    {
        $this->products = Cart::all();
        $this->subtotal = $this->products->sum(fn($item) => $item->quantity * $item->price);
        $this->shippingFee = $this->subtotal > 0 ? 30.00 : 0;
        $this->total = $this->subtotal + $this->shippingFee;
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}

