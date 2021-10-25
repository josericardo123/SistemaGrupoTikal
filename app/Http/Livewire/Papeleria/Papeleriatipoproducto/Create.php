<?php

namespace App\Http\Livewire\Papeleria\Papeleriatipoproducto;

use Livewire\Component;

use App\Models\Papelerias\Papeleriatipoproducto;

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

        $consulta = DB::table('papeleriatipoproductos')->where('nombre', '=', $this->nombre)->get();
        $contador = count($consulta);

        if($contador > 0){
            session()->flash('alert-warning', 'El tipo de producto que desea ingresar, ¡Ya existe!');
        }else{

            Papeleriatipoproducto::create([
                'nombre' => $this->nombre,
                //'estatus' => $this->estatus
            ]);
    
            $this->reset([
                'nombre',
                //'estatus'
            ]);

    
            return redirect()->to('papeleriatipoproductos' . '/' . 'create')->with('alert-success', '¡Tipo producto papeleria agregado con exito!');
        }

    }
    public function render()
    {
        return view('livewire.papeleria.papeleriatipoproducto.create');
    }
}
