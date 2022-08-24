<?php

namespace App\Http\Livewire\Clients\Pages\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Signin extends Component
{

    use LivewireAlert;

    public $email, $password;

    public function render()
    {
        return view('livewire.clients.pages.auth.signin')->extends('layouts.app')->section('content');
    }

    public function signin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->alert('success', 'Succesfully login', [
                'position' => 'top-end',
                'timer' => 4000,
                'toast' => true,
            ]);

            return redirect()->route('admin.home');
        }else{
            $this->alert('error', 'Oppss, Invalid data', [
                'position' => 'top-end',
                'timer' => 4000,
                'toast' => true,
            ]);
        }

    }
}
