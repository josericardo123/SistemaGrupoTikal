<?php

namespace App\Http\Controllers\Papeleria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Papelerias\Papeleriasalida;

class PapeleriaSalidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.papeleriasalidas.index')->only('index');
        $this->middleware('can:admin.papeleriasalidas.create')->only('create', 'store');
        $this->middleware('can:admin.papeleriasalidas.edit')->only('edit', 'update');
        $this->middleware('can:admin.papeleriasalidas.destroy')->only('destroy');
    }


    public function index()
    {
        return view('papeleria.salidas.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Papeleriasalida $papeleriasalida)
    {
        //return view('pepeleria.salidas.show', compact($papeleriasalida));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
