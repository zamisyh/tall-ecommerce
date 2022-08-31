<?php

namespace App\Http\Livewire\Clients\Pages\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Signup extends Component
{
    use LivewireAlert;

    public $first_name, $last_name, $gender, $no_hp, $address, $name, $email, $password, $confirm_password;
    public $openFormNext;

    public function render()
    {
        return view('livewire.clients.pages.auth.signup')->extends('layouts.app')->section('content');
    }

    public function signup()
    {
        $this->validateForm();

        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]);

            $user->customers()->create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'no_hp' => $this->no_hp,
                'address' => $this->address
            ]);

            $this->reset();

            $this->alert('success', 'Succesfully create user', [
                'position' => 'top-end',
                'timer' => 4000,
                'toast' => true,
            ]);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function validateForm()
    {
        $this->validate([
            'email' => 'required|unique:users,email',
            'name' => 'required|min:3',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'no_hp' => 'required|numeric',
            'address' => 'required',
        ]);
    }
}
