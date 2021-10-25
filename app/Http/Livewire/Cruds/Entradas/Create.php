<?php

namespace App\Http\Livewire\Cruds\Entradas;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Cruds\Producto;
use App\Models\Cruds\Entrada;

class Create extends Component
{
    public $codigo;
    //Entradas
    public $fecha;
    public $producto_id;
    public $cantidad_entrada;
    public $multiplicar_total;

    //Productos
    public $entradas;
    public $precio_unidad;
    public $producto;
    public $sumar_producto;

    public function save(Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $this->precio_unidad = $producto->precio_unidad;
        $this->entradas = $producto->entradas;

        $this->validate([
            'fecha' => 'required',
            'cantidad_entrada' => 'required', 
        ],
        [
            'fecha.required' => 'La fecha es requerido',
            'cantidad_entrada' => 'La cantidad es requerido'
        ]);

        $this->multiplicar_total = $this->cantidad_entrada * $this->precio_unidad;

        $this->sumar_producto = $this->entradas + $this->cantidad_entrada;

        $this->producto->update([
            'entradas' => $this->sumar_producto,
            'total' => $this->sumar_producto
        ]);

        Entrada::create([
            'fecha' => $this->fecha,
            'producto_id' => $this->producto_id,
            'cantidad_entrada' => $this->cantidad_entrada,
            'precio' => $this->multiplicar_total
        ]);

        $this->reset([
            'fecha',
            'cantidad_entrada'
        ]);

        session()->flash('message', 'La entrada se registro correctamente');

        /*session()->flash('message', 'La suma es: ' . $this->sumar_producto);
        
        session()->flash('message', 'El total es: ' . $this->multiplicar_total);
        
        Entrada::create([
            'fecha' => $this->fecha,
            'producto_id' => $this->producto_id,
            'cantidad_entrada' => $this->cantidad_entrada,
            'precio' => $this->precio_total
        ]);*/


        //session()->flash('message', 'El id es: '. $this->producto_id . ' y la fecha es: '. $this->fecha . ' La cantidad es: ' . $this->cantidad_entrada . ' y el precio es: ' .$this->precio_unidad);
    }

    public function render()
    {
        $consultas = DB::table('productos')
        ->select('id','producto_codigo','nombre_producto', 'precio_unidad', 'total')
        ->where('producto_codigo','=', $this->codigo)
        ->where('estatus', '=', 1)
        ->get();
        return view('livewire.cruds.entradas.create', compact('consultas'));
    }
}
