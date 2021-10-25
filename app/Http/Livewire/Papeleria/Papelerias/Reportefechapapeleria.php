<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use Livewire\Component;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Papelerias\Papeleria;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Reportefechapapeleria extends Component
{
    public $papeleria;
    public $papeleria_id;
    public function render()
    {
        return view('livewire.papeleria.papelerias.reportefechapapeleria');
    }

    public function reportefechasPDF(Request $request, Papeleria $papeleria){
        $this->papeleria = $papeleria;
        $this->papeleria_id = $papeleria->id;

        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $fecha_inicio = date("d-m-Y", strtotime($request->fecha_inicio));
        $fecha_fin = date("d-m-Y", strtotime($request->fecha_fin));

        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ],
        [
            'fecha_inicio.required' => 'Es necesario ingresar la fecha inicio',
            'fecha_fin.required' => 'Es necesario ingresar la fecha fin para evaluar el rango'
        ]);

        $reportefechas = DB::table(DB::raw('papeleriasalidas s'))
        ->select('s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
        ->join(DB::raw('papelerias p'),'s.producto_id','=','p.id')
        ->whereBetween('s.fecha',[$fecha_inicio,$fecha_fin])
        ->where(function ($query) { $query->where('p.id','=',$this->papeleria->id);})
        ->get();

        $pdf = PDF::loadView('livewire.papeleria.papelerias.reportefechapapeleria', compact('reportefechas', 'año', 'hora_actual'));

        return $pdf->stream('Reporte_papeleria_producto_por_fechas.pdf');
    }
}
