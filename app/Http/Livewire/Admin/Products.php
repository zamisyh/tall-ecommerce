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
use Illuminate\Support\Facades\File;

class Products extends Component
{
    use WithFileUploads, WithPagination, LivewireAlert;
    protected $paginationTheme = 'tailwind';
    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    public $openForm, $search, $rows = 5;
    public $data_category, $data_tag, $data_product;
    public $name, $description, $category, $tag, $stock, $discount, $price, $image;
    public $product_id;

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
                'category_id' => $this->category
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

    public function edit($id)
    {
        $data = Product::where('id', $id)->with('product_detail', 'tag')->first();
        $this->name = $data->name;
        $this->description = $data->description;
        $this->category = $data->category_id;

        for ($i=0; $i < count($data->tag); $i++) {
            $this->tag[] = $data->tag[$i]->pivot->tag_id;
        }

        $this->stock = $data->product_detail->stock;
        $this->discount = $data->product_detail->discount;
        $this->price = $data->product_detail->price;
        $this->image = $data->image;
        $this->product_id = $id;

        $this->openForm = true;
    }

    public function update($id)
    {
        $data = Product::where('id', $id)->with('product_detail', 'tag')->first();
        $data->name = $this->name;
        $data->description = $this->description;
        $data->category_id = $this->category;

        $data->tag()->sync($this->tag);

        $data->product_detail->update([
            'stock' => $this->stock,
            'discount' => $this->discount,
            'price' => $this->price
        ]);

        if ($this->image === $data->image) {
            $data->image = $this->image;
        }else{

            $nameFile = 'foto' . '-' . rand(10000, 99999) . '-' . time() . '.' . $this->image->getClientOriginalExtension();

            $path = public_path('storage/images/products/' . $data->image);
            File::delete($path);
            $this->image->storeAs('public/images/products', $nameFile);
            $data->image = $nameFile;

        }

        $data->update();
        $this->reset();
    }

    public function delete($id)
    {
        $this->confirm('Are you sure delete this data?', [
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

        $data = Product::findOrFail($this->product_id);

        $path = public_path('storage/images/products/' . $data->image);
        File::exists($path) ? File::delete($path) : '';
        $data->delete();

        $this->alert(
            'success',
            'Category deleted'
        );
    }

    public function backButton()
    {
        $this->reset();
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
