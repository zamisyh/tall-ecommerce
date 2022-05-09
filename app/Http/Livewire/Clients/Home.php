<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.clients.home')->extends('layouts.app')->section('content');
    }
}
