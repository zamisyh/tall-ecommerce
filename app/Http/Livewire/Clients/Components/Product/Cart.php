<?php

namespace App\Http\Livewire\Clients\Components\Product;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as ModelsCart;

class Cart extends Component
{
    protected $listeners = [
        'addProduct', 'newQty'
    ];

    public $cart;
    public $size;


    public function render()
    {
        $this->cart = ModelsCart::content();
        return view('livewire.clients.components.product.cart')->extends('layouts.app')->section('content');
    }

    public function addProduct()
    {
        $this->cart = ModelsCart::content();
    }

    public function increment($id)
    {
        $data = ModelsCart::get($id);
        ModelsCart::update($id, $data->qty + 1);
    }


    public function decrement($id)
    {
        $data = ModelsCart::get($id);
        $data->qty <= 1 ? $data->qty + 1 : ModelsCart::update($id, $data->qty - 1);
    }

}
