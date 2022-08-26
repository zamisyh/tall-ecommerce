<?php

namespace App\Http\Livewire\Clients\Pages\Products;

use App\Models\Product;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Detail extends Component
{
    use LivewireAlert;

    public $data_product, $category, $name;

    public function mount($category, $name)
    {
        $this->category = $category;
        $this->name = $name;

        $this->data_product = Product::whereHas('category', function($q) {
            $q->where('slug', $this->category);
        })->where('slug', $this->name)->with('product_detail', 'category', 'tag')->first();

        if (is_null($this->data_product)) {
            return redirect()->route('client.home');
        }
    }

    public function render()
    {
        return view('livewire.clients.pages.products.detail')->extends('layouts.app')->section('content');
    }
}
