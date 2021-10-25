<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use Livewire\Component;
use App\Models\Papelerias\Papeleria;
use Illuminate\Support\Facades\DB;

class Show extends Component
{

    public $producto_codigo;
    public $nombre_producto;
    public $descripcion;
    public $marca;
    public $tipo_producto_id;
    public $entradas;
    public $salidas;
    public $total;
    public $estatus;

    public $papeleria;
    public $papeleria_id;
    public $papelerias;

    public function mount(Papeleria $papeleria){
        $this->papeleria = $papeleria;
        $this->papeleria_id = $papeleria->id;
        $this->papelerias = DB::table(DB::raw('papelerias p'))
        ->select('p.id','p.producto_codigo','p.nombre_producto','p.descripcion','p.marca','t.nombre','p.entradas','p.salidas','p.total', 'p.precio_unidad','p.estatus')
        ->join(DB::raw('papeleriatipoproductos t'),function($join) {$join->on('p.tipo_producto_id','=','t.id')

        ->where('p.id','=', $this->papeleria->id)
        ; })
        ->get();
    }


    public function render()
    {
        return view('livewire.papeleria.papelerias.show');
    }
}
