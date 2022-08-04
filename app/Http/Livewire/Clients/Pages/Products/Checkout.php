<?php

namespace App\Http\Livewire\Clients\Pages\Products;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.clients.pages.products.checkout')->extends('layouts.app')->section('content');
    }
}
