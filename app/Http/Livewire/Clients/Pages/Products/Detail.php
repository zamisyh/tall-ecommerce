<?php

namespace App\Http\Livewire\Clients\Pages\Products;

use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        return view('livewire.clients.pages.products.detail')->extends('layouts.app')->section('content');
    }
}
