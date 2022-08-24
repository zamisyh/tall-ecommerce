<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Category extends Component
{

    use LivewireAlert, WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    public $search, $rows = 5;
    public $openForm;
    public $name, $category_id;


    public function render()
    {
        $data = null;

        $data['data']['data_category'] = ModelsCategory::orderBy('created_at', 'DESC')->paginate($this->rows);

        return view('livewire.admin.category', $data)->extends('layouts.app')->section('content');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:categories,name'
        ]);

        ModelsCategory::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        $this->alert('success', 'Succesfully create data', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
        ]);

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

        $this->category_id = $id;
    }


    public function confirmed()
    {

        ModelsCategory::find($this->category_id)->delete();

        $this->alert(
            'success',
            'Category deleted'
        );
    }


}
