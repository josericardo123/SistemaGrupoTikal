<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Models\Cruds\Producto;
use Illuminate\Http\Request;


class EntradaController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('can:admin.entradas.index')->only('index');
        $this->middleware('can:admin.entradas.create')->only('create', 'store');
        $this->middleware('can:admin.entradas.edit')->only('edit', 'update');
        $this->middleware('can:admin.entradas.destroy')->only('destroy');
    }
    public function index()
    {
        return view('cruds.entradas.index');
    }

    public function create()
    {
        return view('cruds.entradas.create');
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
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

    public function buscar(){
        
    }
}
