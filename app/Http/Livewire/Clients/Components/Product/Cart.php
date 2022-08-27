<?php

namespace App\Http\Livewire\Clients\Components\Product;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as ModelsCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'addProduct', 'newQty', 'confirmed', 'cancelled'
    ];

    public $cart;
    public $size = [], $product_id;


    public function render()
    {
        $this->cart = ModelsCart::content();
        return view('livewire.clients.components.product.cart')->extends('layouts.app')->section('content');
    }

    public function addProduct()
    {
        $this->cart = ModelsCart::content();
    }

    public function increment($id)
    {
        $data = ModelsCart::get($id);
        ModelsCart::update($id, $data->qty + 1);
        $this->emit('updateSubtotal');
    }


    public function decrement($id)
    {
        $data = ModelsCart::get($id);
        $data->qty <= 1 ? $data->qty + 1 : ModelsCart::update($id, $data->qty - 1);
        $this->emit('updateSubtotal');
    }

    public function deleteProduct($id)
    {
        $this->confirm('Are you sure you want to delete this item?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);

        $this->product_id = $id;
    }

    public function confirmed()
    {
        $this->alert('success', 'Success deleting products');
        ModelsCart::remove($this->product_id);
        $this->emit('addProduct');
    }

    public function updatedSize($id)
    {
       foreach ($this->size as $key => $value) {
            $this->product_id = $key;
            $this->size = $value;
       }

       $product = ModelsCart::get($this->product_id);
       ModelsCart::update($product->rowId, ['options' => ['size' => $this->size]]);
       $this->emit('updateSize');
    }


}
