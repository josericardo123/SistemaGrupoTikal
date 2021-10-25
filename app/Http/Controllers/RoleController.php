<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('cruds.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('cruds.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {

        //$datos = $request->name;
        //return response()->json($datos);
        $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'El campo nombre dl rol es requerido'
        ]);

        $consulta = DB::table('roles')->where('name', '=', $request->name)->get();
        $contador = count($consulta);
        if($contador > 0){
            return redirect()->route('admin.roles.create')->with('alert-warning', 'El rol que desea registrar, ¡Ya existe!');
        }else{

            $role = Role::create($request->all());

            $role->permissions()->sync($request->permissions);
    
            return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se creó con éxito');
        }
    }

    public function show(Role $role)
    {
        return view('cruds.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {

        $permissions = Permission::all();
        return view('cruds.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'  => 'required'
        ],
        [
            'name.required' => 'El  campos nombre del rol es requerido'
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se actualizó con éxito');
    }

    public function destroy(Role $role)
    {
        $consulta = DB::table('model_has_roles')->where('model_id', '=', $role->id)->get();
        $contador = count($consulta);

        if($contador > 0){
            
            session()->flash('alert-warning', 'No se puede eliminar el rol');
            return redirect()->route('admin.roles.index');
        }else{
            $role->delete();

            return redirect()->route('admin.roles.index')->with('alert-success', 'El rol se eliminó con éxito');
        }

    }
}
