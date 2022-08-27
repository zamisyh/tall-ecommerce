<?php

namespace App\Http\Livewire\Clients\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Navbar extends Component
{
    protected $listeners = [
        'addProduct', 'deleteProductCount'
    ];

    public $countCart = 0;

    public function mount()
    {
        $this->countCart = Cart::content()->count();
    }

    public function render()
    {
        return view('livewire.clients.components.navbar');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.home');
    }

    public function addProduct()
    {
        $this->countCart = Cart::content()->count();
    }
}
