<?php

namespace App\Http\Livewire\Cruds\Tipoproductos;

use App\Models\Cruds\Tipoproducto;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $nombre;
    //public $estatus;

    public function save(){
        $this->validate([
            'nombre' => 'required',
            //'estatus' => 'required'
        ],
        [
            'nombre.required' => 'El campo nombre del tipo producto es requerido',
            //'estatus.required' => 'El campo estatus es requerido'
        ]);

        $consulta = DB::table('tipoproductos')->where('nombre', '=', $this->nombre)->get();
        $contador = count($consulta);

        if($contador > 0){
            session()->flash('alert-warning', 'El tipo de producto que desea ingresar, ¡Ya existe!');
        }else{

            Tipoproducto::create([
                'nombre' => $this->nombre,
                //'estatus' => $this->estatus
            ]);
    
            $this->reset([
                'nombre',
                //'estatus'
            ]);

    
            return redirect()->to('tipoproductos' . '/' . 'create')->with('alert-success', '¡Tipo producto agregado con exito!');
        }

    }
    public function render()
    {
        return view('livewire.cruds.tipoproductos.create');
    }
}
