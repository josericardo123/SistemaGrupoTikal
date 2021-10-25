<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use App\Models\Papelerias\Papeleria;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\Papelerias\Papeleriatipoproducto;

class Create extends Component
{
    public $producto_codigo;
    public $nombre_producto;
    public $descripcion;
    public $marca;
    public $tipo_producto_id;
    public $entradas = 0;
    public $salidas = 0;
    public $total = 0;
    public $precio_unidad;
    //public $precio_unidad_venta;
    public $estatus;

    public function save(){
        $this->validate([
            'producto_codigo' => 'required',
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'tipo_producto_id' => 'required',
            'precio_unidad' => 'required',
            //'precio_unidad_venta' => 'required',
            'estatus' => 'required'
        ],
        [
            'producto_codigo.required' => 'El campo código del producto es requerido',
            'nombre_producto.required'=> 'El campo nombre del producto es requerido',
            'descripcion.required'  => 'El campo descripción del producto es requerido',
            'marca.required' => 'El campo marca del producto es requerido',
            'tipo_producto_id.required' => 'El campos tipo de producto es requerido',
            'precio_unidad.required' => 'El campo precio unidad proveedor es requerido',
            //'precio_unidad_venta.required' => 'El campo precio unidad venta es requerido',
            'estatus.required' => 'El campo estatus del producto es requerido'
        ]);

        $consulta = DB::table('papelerias')->where('producto_codigo', '=', $this->producto_codigo)->get();
        $contador = count($consulta);

        if($contador > 0){
            session()->flash('alert-warning', 'El código de producto que desea agregar, ¡Ya existe!');
        }else{
            Papeleria::create([
                'producto_codigo' => $this->producto_codigo,
                'nombre_producto'=> $this->nombre_producto,
                'descripcion' => $this->descripcion,
                'marca' => $this->marca,
                'tipo_producto_id' => $this->tipo_producto_id,
                'entradas' => $this->entradas,
                'salidas' => $this->salidas,
                'total' => $this->entradas,
                'precio_unidad' => $this->precio_unidad,
                //'precio_unidad_venta' => $this->precio_unidad_venta,
                'estatus' => $this->estatus
            ]);
    
            $this->reset([
                'producto_codigo',
                'nombre_producto',
                'descripcion',
                'marca',
                'tipo_producto_id',
                'precio_unidad',
                'estatus'
            ]);
    
            return redirect()->to('papelerias' .'/' . 'create')->with('alert-success', '¡Producto guardado con exito!');

        }
    }
    public function render()
    {
        $tipoproductos = Papeleriatipoproducto::all();
        return view('livewire.papeleria.papelerias.create', compact('tipoproductos'));
    }
}
