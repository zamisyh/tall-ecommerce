<?php

namespace App\Http\Livewire\Clients\Components\Product;

use App\Models\Product;
use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        $data = null;

        $data['data']['data_product'] = Product::with('product_detail', 'tag', 'category')->orderBy('created_at', 'DESC')->get();

        return view('livewire.clients.components.product.lists', $data)->extends('layouts.app')->section('content');
    }
}
