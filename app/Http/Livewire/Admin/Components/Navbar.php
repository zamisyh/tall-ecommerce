<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;

class Navbar extends Component
{
    public $isLogout;

    public function render()
    {
        return view('livewire.admin.components.navbar')->extends('layouts.app')->section('content');
    }
}
