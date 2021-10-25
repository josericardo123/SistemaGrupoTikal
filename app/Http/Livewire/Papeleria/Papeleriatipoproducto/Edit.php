<?php

namespace App\Http\Livewire\Papeleria\Papeleriatipoproducto;

use Livewire\Component;
use App\Models\Papelerias\Papeleriatipoproducto;

use Illuminate\Support\Facades\DB;

class Edit extends Component
{

    public $nombre;
    //public $estatus;

    public $pepeleriatipoproducto;
    public $papeleriatipoproducto_id;

    public function mount(Papeleriatipoproducto $papeleriatipoproducto){
        $this->papeleriatipoproducto = $papeleriatipoproducto;
        $this->papeleriatipoproducto_id = $papeleriatipoproducto->id;
        $this->nombre = $papeleriatipoproducto->nombre;
        //$this->estatus = $papeleriatipoproducto->estatus;

    }

    
    public function save(){
        $this->validate([
            'nombre' => 'required',
            //'estatus' => 'required'
        ],
        [
            'nombre.required' => 'El campo nombre del tipo producto es requerido',
            //'estatus.required' => 'El campo estatus es requerido'
        ]);

        $this->papeleriatipoproducto->update([
            'nombre' => $this->nombre,
            //'estatus' => $this->estatus,
        ]);

        session()->flash('alert-success', '¡El tipo de producto se actualizo con exito!');

    }
    public function render()
    {
        return view('livewire.papeleria.papeleriatipoproducto.edit');
    }
}
