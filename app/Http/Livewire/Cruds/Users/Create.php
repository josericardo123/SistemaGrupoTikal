<?php

namespace App\Http\Livewire\Cruds\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class Create extends Component
{
    public $name;
    public $email;
    public $password;



    public function save(){
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ])->assignRole('RolSinPermisos');

        session()->flash('alert-success', 'Usuario creado con exito');

        $this->reset(['name', 'email', 'password']);

    }

    public function render()
    {
        $datos = User::all();
        return view('livewire.cruds.users.create', compact('datos'));
    }
}

