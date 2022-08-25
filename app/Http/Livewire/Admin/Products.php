<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Category;
use App\Models\Tag;

class Products extends Component
{
    use WithFileUploads, WithPagination, LivewireAlert;
    protected $paginationTheme = 'tailwind';

    public $openForm, $search, $rows = 5;
    public $data_category, $data_tag, $data_product;
    public $name, $description, $category, $tag, $stock, $discount, $price, $image;

    public function mount()
    {
        $this->data_category = Category::orderBy('created_at', 'DESC')->get();
        $this->data_tag = Tag::orderBy('created_at', 'DESC')->get();
    }


    public function render()
    {
        $data = null;

        if ($this->search) {
            $data['data']['data_product'] = Product::where('name', 'LIKE', '%' . $this->search . '%')->with('product_detail')->orderBy('created_at', 'DESC')->paginate($this->rows);

        }else{
            $data['data']['data_product'] = Product::with('product_detail', 'tag')->orderBy('created_at', 'DESC')->paginate($this->rows);

        }



        return view('livewire.admin.products', $data)->extends('layouts.app')->section('content');
    }

    public function save()
    {
        $this->validationSchema();

        try {
            $nameFile = 'foto' . '-' . rand(10000, 99999) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/products', $nameFile);

            $product = Product::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'image' => $nameFile,
            ]);

            $product->product_detail()->create([
                'stock' => $this->stock,
                'discount' => $this->discount,
                'price' => $this->price
            ]);

            $product->tag()->attach($this->tag);

            $this->alert('success', 'Succesfully create data', [
                'position' => 'top-end',
                'timer' => 4000,
                'toast' => true,
            ]);

            $this->reset();


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function validationSchema()
    {
        return $this->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tag' => 'required',
            'stock' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'price' => 'required|numeric',
        ]);
    }
}
