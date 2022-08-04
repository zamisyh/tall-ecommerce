<?php

namespace App\Http\Livewire\Clients\Components;

use Livewire\Component;

class Search extends Component
{

    public $category, $tanggal;

    public function render()
    {
        return view('livewire.clients.components.search')->extends('layouts.app')->section('content');
    }

    public function openCategory()
    {
        $this->category = true;
        $this->tanggal = false;
    }

    public function openTanggal()
    {
        $this->category = false;
        $this->tanggal = true;
    }
}
