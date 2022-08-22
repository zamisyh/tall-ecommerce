<?php

namespace App\Http\Livewire\Clients\Pages\Products;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Checkout extends Component
{

    public $data_provinsi, $data_kota, $data_kecamatan, $data_kelurahan;
    public $selectedProvinsi, $selectedKota, $selectedKecamatan, $selectedKelurahan;
    public $loading;
    public $origin, $destination, $cost, $weight, $courier, $ongkir;
    public $textOpen, $openCost;

    protected $listeners = [
        'openedCost'
    ];


    public function render()
    {
        $data = null;
        $data['data']['data_provinsi'] = Http::get('http://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
        $data['data']['data_provinsi_ongkir'] = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/city')->json();

        // dd($data['data']['data_provinsi_ongkir']);

        if ($this->openCost) {
            $data['data']['data_cost'] = Http::withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $this->origin,
                'destination' => $this->destination,
                'weight' => 1,
                'courier' => $this->courier
            ])->json();

            // dd($data['data']['data_cost']);
        }


        return view('livewire.clients.pages.products.checkout', $data)->extends('layouts.app')->section('content');
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

    public function updatedCourier()
    {
        if (!is_null($this->destination) && !is_null($this->origin)) {
            $this->openCost = true;
        }
    }

    public function updatedOrigin()
    {
        if (!is_null($this->destination) && !is_null($this->courier)) {
            $this->openCost = true;
        }
    }

    public function updatedDestination()
    {
        if (!is_null($this->origin) && !is_null($this->courier)) {
          $this->openCost = true;
        }
    }

    public function openedCost()
    {
        $this->textOpen = "Loading Cost";
    }
}
