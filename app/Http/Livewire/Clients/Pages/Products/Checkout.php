<?php

namespace App\Http\Livewire\Clients\Pages\Products;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Midtrans\Config;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Checkout extends Component
{

    use LivewireAlert;

    public $data_provinsi, $data_kota, $data_kecamatan, $data_kelurahan;
    public $selectedProvinsi, $selectedKota, $selectedKecamatan, $selectedKelurahan;
    public $loading;
    public $origin, $destination, $cost, $weight, $courier, $ongkir;
    public $textOpen, $openCost;
    public $snapToken, $isConfirmCheckout;
    public $cart, $finalTotal = 0, $btnConfirm;

    protected $listeners = [
        'openedCost',
        'updateSubtotal' => 'updateTable',
        'updateSize' => 'updateTable',
        'saveCartToDb'
    ];

    // public function mount()
    // {

    // }

    public function render()
    {
        if (Cart::count() === 0) {
            redirect()->route('client.home');
        }elseif(!Auth::check()) {
            redirect()->route('client.auth.signin');
            session()->flash('message', 'Oppss, sepertinya anda belum login, yuk buruan login');

        }

        $data = null;

        $data['data']['data_provinsi'] = Http::get('https://api.iluzi.id/region/')->json();
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
                'weight' => $this->getWeight(),
                'courier' => $this->courier
            ])->json();

            // dd($data['data']['data_cost']);
        }

        $this->cart = Cart::content();

        return view('livewire.clients.pages.products.checkout', $data)->extends('layouts.app')->section('content');
    }

    public function updatedSelectedProvinsi($id)
    {
        $this->data_kota = Http::get('https://api.iluzi.id/region/province?id=' . $id)->json();
    }

    public function updatedSelectedKota($id)
    {
        $this->data_kecamatan = Http::get('https://api.iluzi.id/region/regency?id=' . $id)->json();
    }

    public function updatedSelectedKecamatan($id)
    {
        $this->data_kelurahan = Http::get('https://api.iluzi.id/region/district?id=' . $id)->json();

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

        // $items = [];

        // foreach (Cart::content() as $key => $value) {
        //     $items[] = [
        //         'id' => $value->id,
        //         'price' => $value->price,
        //         'quantity' => $value->qty,
        //         'name' => $value->name,
        //     ];
        // }

        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $this->finalTotal
        ];

        $customerDetails = [
            "first_name" => "TEST",
            "last_name" => "UTOMO",
            "email" => "test@midtrans.com",
            "phone" => "+628123456",
            "billing_address" => [
                "first_name" => "TEST",
                "last_name" => "UTOMO",
                "phone" => "081 2233 44-55",
                "address" => "Sudirman",
                "city" => "Jakarta",
                "postal_code" => "12190",
                "country_code" => "IDN"
            ],
            "shipping_address" => [
                "first_name" => "TEST",
                "last_name" => "UTOMO",
                "phone" => "0 8128-75 7-9338",
                "address" => "Sudirman",
                "city" => "Jakarta",
                "postal_code" => "12190",
                "country_code" => "IDN",
            ]
        ];

        $payload = [
            'customer_details' => $customerDetails,
            'transaction_details' => $transactionDetails,
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

    public function updateTable()
    {
        $this->cart = Cart::content();
    }

    public function getWeight()
    {
        $cart = Cart::content();
        $data = null;

        foreach ($cart as $key => $value) {
            $data[] = $cart[$key]->weight;
        }

        return array_sum($data);

    }

    public function updatedOngkir()
    {
        $cartTotal = intval(str_replace(',', '', Cart::total()));
        $this->finalTotal = $cartTotal + $this->ongkir;


        $this->btnConfirm = true;
    }

    public function saveCartToDb()
    {
        // Cart::destroy();
        // return redirect()->route('client.home');

    }


}
