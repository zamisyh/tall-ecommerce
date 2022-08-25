<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag as ModelsTag;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Tag extends Component
{
    use LivewireAlert, WithPagination;
    protected $paginationTheme = 'tailwind';
    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    public $search, $rows = 5;
    public $openForm;
    public $name, $tag_id;

    public function render()
    {
        $data = null;

        if ($this->search) {
            $data['data']['data_tag'] = ModelsTag::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($this->rows);
        } else {
            $data['data']['data_tag'] = ModelsTag::orderBy('created_at', 'DESC')->paginate($this->rows);
        }


        return view('livewire.admin.tag', $data)->extends('layouts.app')->section('content');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:tags,name'
        ]);

        ModelsTag::create([
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

        $this->tag_id = $id;
    }


    public function confirmed()
    {

        ModelsTag::find($this->tag_id)->delete();

        $this->alert(
            'success',
            'Category deleted'
        );
    }
}
