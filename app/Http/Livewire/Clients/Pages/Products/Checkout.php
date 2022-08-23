<?php

namespace App\Http\Livewire\Clients\Pages\Products;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Midtrans\Config;


class Checkout extends Component
{

    public $data_provinsi, $data_kota, $data_kecamatan, $data_kelurahan;
    public $selectedProvinsi, $selectedKota, $selectedKecamatan, $selectedKelurahan;
    public $loading;
    public $origin, $destination, $cost, $weight, $courier, $ongkir;
    public $textOpen, $openCost;
    public $snapToken, $isConfirmCheckout;

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

    public function checkout()
    {
        $customerDetails = [
            'first_name' => 'Zamzam',
            'last_name' => 'Saputra',
            'email' => 'zamsyh.dev@gmail.com',
            'phone' => '6289602361231',
            'address' => 'Jln. Melati',
            'city' => 'Kota Bekasi',
            'postal_code' => 17122
        ];

        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => 70000
        ];

        $payload = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails
        ];


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $this->snapToken = \Midtrans\Snap::getSnapToken($payload);

        $this->isConfirmCheckout = true;
    }
}
