<?php

namespace App\Http\Livewire\Cruds\Proveedores;

use App\Models\Cruds\Proveedor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $nombre;
    public $direccion;
    public $telefono;
    public $email;

    public function save(){
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

        $consulta = DB::table('proveedors')->where('nombre', '=', $this->nombre)->get();
        $contador = count($consulta);

        if($contador > 0){
            session()->flash('alert-danger', 'El nombre de proveedor que desea regisrar, ¡Ya existe!');
        }else{
            Proveedor::create([
                'nombre' => $this->nombre,
                'direccion'  => $this->direccion,
                'telefono' => $this->telefono,
                'email' => $this->email,
            ]);

            return redirect()->to('proveedores' . '/' . 'create')->with('alert-success', 'Proveedor guardado con éxito');
        }
    }
    public function render()
    {
        return view('livewire.cruds.proveedores.create');
    }
}
