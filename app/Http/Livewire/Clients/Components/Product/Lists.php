<?php

namespace App\Http\Livewire\Clients\Components\Product;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Lists extends Component
{
    use LivewireAlert;

    public function render()
    {
        $data = null;

        $data['data']['data_product'] = Product::with('product_detail', 'tag', 'category')->orderBy('created_at', 'DESC')->get();

        return view('livewire.clients.components.product.lists', $data)->extends('layouts.app')->section('content');
    }

    public function addToCart($id)
    {
        $product = Product::where('id', $id)->with('product_detail')->first();
        $discountPrice = null;

        if ($product->product_detail->discount > 0) {
            $discountPrice = $product->product_detail->price - ($product->product_detail->price / 100) * $product->product_detail->discount;
        }else{
            $discountPrice = $product->product_detail->price;
        }

        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $discountPrice,
            'weight' => $product->product_detail->weight,
            'discount' => $product->product_detail->discount,
            'options' => [
                'size' => '',
                'ongkir' => ''
            ]
        ];

        Cart::add($data)->associate('products');

        $this->emit('addProduct', $id);

        $this->alert('success', 'Product berhasil ditambahkan ke keranjang', [
            'position' => 'bottom-end',
            'timer' => 4000,
            'toast' => true,
        ]);
    }
}
