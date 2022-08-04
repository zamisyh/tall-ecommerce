<?php

namespace App\Http\Livewire\Clients\Components\Product;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('livewire.clients.components.product.lists')->extends('layouts.app')->section('content');
    }
}
