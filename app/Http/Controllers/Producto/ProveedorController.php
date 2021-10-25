<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cruds\Proveedor;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.proveedores.index')->only('index');
        $this->middleware('can:admin.proveedores.create')->only('create', 'store');
        $this->middleware('can:admin.proveedores.edit')->only('edit', 'update');
        $this->middleware('can:admin.proveedores.destroy')->only('destroy');
    }
    public function index()
    {
        return view('cruds.proveedores.index');
    }

    public function create()
    {
        return view('cruds.proveedores.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Proveedor $proveedore)
    {
        return view('cruds.proveedores.show', compact('proveedore'));
    }

    public function edit(Proveedor $proveedore)
    {
        return view('cruds.proveedores.edit', compact('proveedore'));
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
