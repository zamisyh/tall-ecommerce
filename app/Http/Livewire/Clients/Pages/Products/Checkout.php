<?php

namespace App\Http\Livewire\Clients\Pages\Products;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Checkout extends Component
{

    public $data_provinsi, $data_kota, $data_kecamatan, $data_kelurahan;
    public $selectedProvinsi, $selectedKota, $selectedKecamatan, $selectedKelurahan;
    public $loading;

    public function mount()
    {
        $this->data_provinsi = Http::get('http://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
    }


    public function render()
    {
        return view('livewire.clients.pages.products.checkout')->extends('layouts.app')->section('content');
    }

    public function updatedSelectedProvinsi($id)
    {
        $this->data_kota = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $id)->json();
    }

    public function updatedSelectedKota($id)
    {
        $this->data_kecamatan = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $id)->json();
    }

    public function updatedSelectedKecamatan($id)
    {
        $this->data_kelurahan = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $id)->json();

    }
}
