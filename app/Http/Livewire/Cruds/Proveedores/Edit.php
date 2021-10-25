<?php

namespace App\Http\Livewire\Cruds\Proveedores;

use App\Models\Cruds\Proveedor;
use Livewire\Component;

class Edit extends Component
{
    public $nombre;
    public $direccion;
    public $telfono;
    public $email;

    public $proveedore;

    public function mount(Proveedor $proveedore){
        $this->proveedore = $proveedore;
        $this->nombre = $proveedore->nombre;
        $this->direccion = $proveedore->direccion;
        $this->telefono = $proveedore->telefono;
        $this->email = $proveedore->email;
    }

    public function save(Proveedor $proveedore){
        $this->proveedore = $proveedore;
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|integer',
            'email' => 'required|email',
        ],
        [
            'nombre.required' => 'El campo nombre del proveedor es requerido',
            'direccion.required' => 'El campo dirección es requerido',
            'telefono.required' => 'El campo teléfono es requerido',
            'email.required' => 'El campo email es requerido'
        ]);
        
        $this->proveedore->update([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'email' => $this->email
        ]);

        session()->flash('alert-success', '¡Proveedor actualizado con exito!');

    }
    public function render()
    {
        return view('livewire.cruds.proveedores.edit');
    }
}
