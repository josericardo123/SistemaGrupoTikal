<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use Livewire\Component;
use App\Models\Papelerias\Papeleria;
use App\Models\Papelerias\Papeleriatipoproducto;
use App\Models\Papelerias\Papeleriaentrada;
use App\Models\Papelerias\Papeleriasalida;
use Carbon\Carbon;
class Edit extends Component
{

    //Productos papeleria
    public $producto_codigo;
    public $nombre_producto;
    public $descripcion;
    public $marca;
    public $tipo_producto_id;
    public $precio_unidad;
    //public $precio_unidad_venta;
    public $estatus;

    public $entradas;
    public $salidas;
    public $total;

    public $papeleria;
    public $papeleria_id;

    public $fecha;

    //Operaciones de productos
    public $cantidad_entrada;
    public $cantidad_salida;

    public $sumar_producto;
    public $sumar_producto_total;
    public $multiplicar_total;

    public $multiplicar_total_salida;
    public $sumar_producto_salida;
    public $restar_producto_salida;


    public function mount(Papeleria $papeleria){
        $this->papeleria = $papeleria;
        $this->papeleria_id= $papeleria->id;
        $this->producto_codigo = $papeleria->producto_codigo;
        $this->nombre_producto = $papeleria->nombre_producto;
        $this->descripcion = $papeleria->descripcion;
        $this->marca = $papeleria->marca;
        $this->tipo_producto_id = $papeleria->tipo_producto_id;
        $this->precio_unidad = $papeleria->precio_unidad;
        //$this->precio_unidad_venta = $papeleria->precio_unidad_venta;
        $this->estatus = $papeleria->estatus;
        $this->entradas = $papeleria->entradas;
        $this->salidas = $papeleria->salidas;
        $this->total = $papeleria->total;
        
    }

    public function save(Papeleria $papeleria){
        $this->papeleria = $papeleria;

        $this->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'tipo_producto_id' => 'required',
            'precio_unidad' => 'required',
            //'precio_unidad_venta' => 'required',
            'estatus' => 'required',
        ],
        [
            'nombre_producto.required' => 'El campo nombre del producto es requerido',
            'descripcion.required' => 'El campo descripcion es requerido',
            'marca.required' => 'El campo marca del producto es requerido',
            'tipo_producto_id.required' => 'El campo tipo del producto es requerido',
            'precio_unidad.required' => 'El campo precio unidad del producto es requerido',
            //'precio_unidad_venta.required' => 'El campo precio unidad venta es requerido',
            'estatus.required' => 'El campos estatus es requerido',
        ]);

        $this->papeleria->update([
            'nombre_producto' => $this->nombre_producto,
            'descripcion' => $this->descripcion,
            'marca' => $this->marca,
            'tipo_producto_id' => $this->tipo_producto_id,
            'precio_unidad' => $this->precio_unidad,
            'estatus' => $this->estatus
        ]);

        session()->flash('alert-success', 'Producto actualizado con éxito');
    }

    public function operaciones(Papeleria $papeleria){
        $this->papeleria = $papeleria;

        $this->fecha = Carbon::now();
        $fecha_actual = $this->fecha->format('d-m-Y');
        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        /*$this->validate([
            'fecha' => 'required',
        ],
        [
            'fecha.required' => 'El campo fecha es requerido,',
        ]);*/

        //Entrada de productos
        $this->multiplicar_total = ((int)$this->cantidad_entrada * (int)$papeleria->precio_unidad);

        $this->sumar_producto_total = ((int)$papeleria->total + (int)$this->cantidad_entrada);

        $this->sumar_producto = ((int)$papeleria->entradas + (int)$this->cantidad_entrada);

        //Salida de prodcutos

        $this->multiplicar_total_salida = ((int)$papeleria->precio_unidad * (int)$this->cantidad_salida);

        $this->sumar_producto_salida = ((int)$papeleria->salidas + (int)$this->cantidad_salida);

        $this->restar_producto_salida = ((int)$papeleria->total - (int)$this->cantidad_salida);

        if($this->cantidad_entrada && $this->cantidad_salida  != ''){
            session()->flash('alert-warning', 'Solo puedes ingresar una cantidad en uno de los dos campos "Cantidad de entradas" ó "Cantida de salidas"'); 
        }else if($this->cantidad_entrada != ''){
            if(!is_numeric($this->cantidad_entrada)){
                session()->flash('alert-warning', 'Solo se aceptan números');
            }else{
                $papeleria->update([
                    'entradas' => $this->sumar_producto,
                    'total'=> $this->sumar_producto_total
                ]);
        
                Papeleriaentrada::create([
                    'fecha' => $fecha_actual,
                    'hora' => $hora_actual,
                    'producto_id' => $this->papeleria_id,
                    'cantidad_entrada' => $this->cantidad_entrada,
                    'precio' => $this->multiplicar_total
                ]);
        
                $this->reset([
                    //'fecha',
                    'cantidad_entrada'
                ]);

                session()->flash('alert-success', 'La entrada del producto se registro correctamente, con un total del STOCK igual a: ' . $this->sumar_producto_total. ' productos');
            }
        }else if($this->cantidad_salida != ''){
            if(!is_numeric($this->cantidad_salida)){
                session()->flash('alert-warning', 'Solo se aceptan números');
            }else if($this->cantidad_salida > $papeleria->total){
                session()->flash('alert-warning', 'La cantidad de salida es mayor al total de productos existentes, por favor revise el total del producto');
            }else{

                $this->papeleria->update([
                    'salidas' => $this->sumar_producto_salida,
                    'total'=> $this->restar_producto_salida
                ]);
        
                Papeleriasalida::create([
                    'fecha' => $fecha_actual,
                    'hora' => $hora_actual,
                    'producto_id' => $this->papeleria_id,
                    'cantidad_salida' => $this->cantidad_salida,
                    'precio' => $this->multiplicar_total_salida
                ]);
        
                $this->reset([
                    //'fecha',
                    'cantidad_salida'
                ]);
        
                session()->flash('alert-success', 'La salida del producto se registró correctamente, con un total del STOCK igual a: ' . $this->restar_producto_salida . ' productos restantes');
            }
        }

        //session()->flash('alert-warning', 'La resta es: ' . $this->restar_producto_salida);
    }
    public function render()
    {
        
        $now = Carbon::now();

        $tipoproductos = Papeleriatipoproducto::all();
        return view('livewire.papeleria.papelerias.edit', compact('tipoproductos', 'now'));
    }
}
