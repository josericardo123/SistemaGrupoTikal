<?php

namespace App\Http\Livewire\Cruds\Productos;

use Livewire\Component;

use App\Models\Cruds\Producto;
use App\Models\Cruds\Tipoproducto;
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

    public $producto;
    public $producto_id;
    public $productos;

    public function mount(Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $this->productos = DB::table(DB::raw('productos p'))
        ->select('p.id','p.producto_codigo','p.nombre_producto','p.descripcion','p.marca','t.nombre','p.entradas','p.salidas','p.total','p.precio_unidad','p.estatus')
        ->join(DB::raw('tipoproductos t'),function($join) {$join->on('p.tipo_producto_id','=','t.id')
        
        ->where('p.id','=', $this->producto_id)
        ; })
        ->get();
    }



    public function render()
    {
        return view('livewire.cruds.productos.show');
    }
}
