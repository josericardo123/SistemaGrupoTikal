<?php

namespace App\Http\Livewire\Cruds\Salidas;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Cruds\Producto;
use App\Models\Cruds\Salida;

class Create extends Component
{
    public $codigo;

    //Salidas
    public $fecha;
    public $producto_id;
    public $cantidad_salida;
    public $multiplicar_total;
    
    //Productos
    public $total;
    public $salidas;
    public $precio_unidad_venta;
    public $producto;
    public $sumar_producto;
    public $restar_producto;

    public function save(Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $this->precio_unidad_venta = $producto->precio_unidad_venta;
        $this->salidas = $producto->salidas;
        $this->total = $producto->total;

        $this->validate([
            'fecha' => 'required',
            'cantidad_salida' => 'required',
        ],
        [
            'fecha.required' => 'La fecha es requerido',
            'cantidad_salida.required' => 'La cantidad de producto a vender es requerido'
        ]);

        $this->multiplicar_total = $this->cantidad_salida * $this->precio_unidad_venta;

        $this->sumar_producto = $this->salidas + $this->cantidad_salida;

        $this->restar_producto = $this->total - $this->cantidad_salida;

        //session()->flash('message', 'La resta es: ' . $this->restar_producto);

        if($this->total == 0){
            session()->flash('message', 'El producto esta agotado');

            $this->reset([
                'fecha',
                'cantidad_salida'
            ]);
        }else{

            $this->producto->update([
                'salidas' => $this->sumar_producto,
                'total' => $this->restar_producto
            ]);
    
            Salida::create([
                'fecha' => $this->fecha,
                'producto_id' => $this->producto_id,
                'cantidad_salida' => $this->cantidad_salida,
                'precio' => $this->multiplicar_total
            ]);
    
            $this->reset([
                'fecha',
                'cantidad_salida'
            ]);
    
            session()->flash('message', 'La salida del producto se realizo correctamente');
    
        }
        //session()->flash('message', 'El id es: ' . $this->producto_id . ' la fecha es: ' .$this->fecha . 'La cantidad es: ' .$this->cantidad_salida . 'Precio total es: ' . $this->multiplicar_total);
    }
    public function render()
    {
        $consultas = DB::table('productos')
            ->select('id','producto_codigo','nombre_producto', 'precio_unidad_venta', 'total')
            ->where('producto_codigo','=', $this->codigo)
            ->where('estatus', '=', 1)
            ->get();
        return view('livewire.cruds.salidas.create', compact('consultas'));
    }
}
