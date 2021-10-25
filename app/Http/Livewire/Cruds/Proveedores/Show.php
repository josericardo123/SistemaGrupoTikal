<?php

namespace App\Http\Livewire\Cruds\Proveedores;

use Livewire\Component;
use App\Models\Cruds\Proveedor;

class Show extends Component
{
    public $nombre;
    public $direccion;
    public $telefono;
    public $email;

    public $proveedore;

    public function mount(Proveedor $proveedor){
        $this->proveedor = $proveedor;
    }
    public function render()
    {
        return view('livewire.cruds.proveedores.show');
    }
}
