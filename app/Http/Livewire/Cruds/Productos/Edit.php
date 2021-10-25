<?php

namespace App\Http\Livewire\Cruds\Productos;


use Livewire\Component;

use App\Models\Cruds\Producto;
use App\Models\Cruds\Tipoproducto;
use App\Models\Cruds\Entrada;
use App\Models\Cruds\Proveedor;
use App\Models\Cruds\Salida;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{

    public $producto_codigo;
    public $nombre_producto;
    public $descripcion;
    public $marca;
    public $tipo_producto_id;
    public $precio_unidad;
    //public $precio_unidad_venta;
    public $total;
    public $estatus;

    public $producto;
    public $producto_id;

    //Entradas
    public $fecha;
    public $hora;
    public $multiplicar_total;
    public $sumar_producto;

    public $cantidad_entrada;
    public $proveedor;

    public $cantidad_salida;
    public $entradas;
    public $salidas;

    //Salidas
    public $multiplicar_total_salida;
    public $sumar_producto_salida;
    public $sumar_producto_total;
    public $restar_producto_salida;

    
    public function mount(Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $this->producto_codigo = $producto->producto_codigo;
        $this->nombre_producto = $producto->nombre_producto;
        $this->descripcion = $producto->descripcion;
        $this->marca = $producto->marca;
        $this->tipo_producto_id = $producto->tipo_producto_id;
        $this->entradas = $producto->entradas;
        $this->salidas = $producto->salidas;
        $this->precio_unidad = $producto->precio_unidad;
        //$this->precio_unidad_venta = $producto->precio_unidad_venta;
        $this->total = $producto->total;
        $this->estatus = $producto->estatus;
    }

    public function save(Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $this->validate([
            'producto_codigo' => 'required',
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'tipo_producto_id' => 'required',
            'precio_unidad' => 'required',
            'estatus' => 'required'
        ],
        [
            'producto_codigo.required' => 'El campo código del producto es requerido',
            'nombre_producto.required'=> 'El campo nombre del producto es requerido',
            'descripcion.required'  => 'El campo descripción del producto es requerido',
            'marca.required' => 'El campo marca del producto es requerido',
            'tipo_producto_id.required' => 'El campos tipo de producto es requerido',
            'precio_unidad.required' => 'El campo precio es requerido',
            'estatus.required' => 'El campo estatus del producto es requerido'
        ]);
        
        $this->producto->update([
            'nombre_producto' => $this->nombre_producto,
            'descripcion' => $this->descripcion,
            'marca' => $this->marca,
            'tipo_producto_id' => $this->tipo_producto_id,
            'precio_unidad' => $this->precio_unidad,
            //'precio_unidad_venta' => $this->precio_unidad_venta,
            'estatus' => $this->estatus
        ]);

        session()->flash('alert-success', '¡Producto actualizado con exito!');
        
    }

    public function entrada(Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $this->fecha = Carbon::now();
        $fecha_actual = $this->fecha->format('d-m-Y');
        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        /*$this->validate([
            'fecha' => 'required',
        ],
        [
            'fecha.required' => 'La fecha es requerido'
        ]);*/
        //Entradas
        $this->multiplicar_total = ((int)$this->cantidad_entrada * (int)$producto->precio_unidad);

        $this->sumar_producto_total = ((int)$producto->total + (int)$this->cantidad_entrada);

        $this->sumar_producto = ((int)$producto->entradas + (int)$this->cantidad_entrada);

        //Salidas
        $this->multiplicar_total_salida = ((int)$producto->precio_unidad * (int)$this->cantidad_salida);

        $this->sumar_producto_salida = ((int)$producto->salidas + (int)$this->cantidad_salida);

        $this->restar_producto_salida = ((int)$producto->total - (int)$this->cantidad_salida);

        if($this->cantidad_entrada && $this->cantidad_salida  != ''){
            session()->flash('alert-warning', 'Solo puedes ingresar una cantidad en uno de los dos campos "Cantidad de entradas" ó "Cantida de salidas"'); 
            
            $this->reset([
                'cantidad_entrada',
                'cantidad_salida'
            ]);
            
        }else if(is_numeric($this->cantidad_entrada) && $this->cantidad_entrada != ''){
            if($this->proveedor != ''){
                $producto->update([
                    'entradas' => $this->sumar_producto,
                    'total'=> $this->sumar_producto_total
                ]);
        
                Entrada::create([
                    'fecha' => $fecha_actual,
                    'hora' => $hora_actual,
                    'producto_id' => $this->producto_id,
                    'proveedor_id' => $this->proveedor,
                    'cantidad_entrada' => $this->cantidad_entrada,
                    'precio' => $this->multiplicar_total
                ]);
        
                $this->reset([
                    //'fecha',
                    'cantidad_entrada'
                ]);

                session()->flash('alert-success', 'La entrada del producto se registro correctamente, con un total del STOCK igual a: ' . $this->sumar_producto_total. ' productos');
            }else{
                session()->flash('alert-warning', 'Seleccioanar proveedor del producto');
            }
        }else if($this->cantidad_salida != ''){
            if(!is_numeric($this->cantidad_salida)){
                session()->flash('alert-warning', 'Solo se aceptan números');
            }else if($this->cantidad_salida > $producto->total){
                session()->flash('alert-warning', 'La cantidad de salida es mayor al total de productos existentes, por favor revise el total del producto');
            }else{

                $this->producto->update([
                    'salidas' => $this->sumar_producto_salida,
                    'total'=> $this->restar_producto_salida
                ]);
        
                Salida::create([
                    'fecha' => $fecha_actual,
                    'hora' => $hora_actual,
                    'producto_id' => $this->producto_id,
                    'cantidad_salida' => $this->cantidad_salida,
                    'precio' => $this->multiplicar_total_salida
                ]);
        
                $this->reset([
                    'fecha',
                    'cantidad_salida'
                ]);
        
                session()->flash('alert-success', 'La salida del producto se registró correctamente, con un total del STOCK igual a: ' . $this->restar_producto_salida . ' productos restantes');
            }
        }

    }

    public function render()
    {

        $now = Carbon::now();
        $tipoproductos = Tipoproducto::all();
        $proveedores = Proveedor::all();
        return view('livewire.cruds.productos.edit', compact('tipoproductos', 'now', 'proveedores'));
    }
}
