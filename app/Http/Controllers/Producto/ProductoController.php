<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Cruds\Producto;

class ProductoController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('can:admin.productos.index')->only('index');
        $this->middleware('can:admin.productos.create')->only('create', 'store');
        $this->middleware('can:admin.productos.edit')->only('edit', 'update');
        $this->middleware('can:admin.producto.destroy')->only('destroy');
        $this->middleware('can:admin.productos.inactivo')->only('inactivo');
    }
    public function index()
    {
        return view('cruds.productos.index');
    }

 
    public function create()
    {
        return view('cruds.productos.create');
    }


    public function store(Request $request)
    {
        //
    }

 
    public function show(Producto $producto)
    {
        return view('cruds.productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('cruds.productos.edit', compact('producto'));
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }

    public function inactivo(){

        $inactivos = Producto::all()->where('estatus', '=', 2);
        return view('cruds.productos.inactivos', compact('inactivos'));
    }

}
