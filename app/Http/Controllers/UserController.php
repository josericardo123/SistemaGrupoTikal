<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Models\User;
//use Intervention\Image\Facades\Image As Image;

class UserController extends Controller
{
    public $imagen;
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }
    public function index()
    {
        return view('cruds.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('cruds.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asignó los roles correctamente');
    }

    public function perfil(){
        return view('cruds.users.perfil');
    }

    public function updatePerfil(Request $request, User $user){

        $id = $request->id;

        $datos = request()->except('_token', 'id');


        if($request->hasFile('imagen')){
  
            $user = User::findOrFail($id);

            Storage::delete('public/' . $user->imagen);

            $datos['imagen'] = $request->file('imagen')->store('perfiles', 'public');

            User::where('id', '=', $id)->update($datos);


        }


        return redirect('profile/username')->with('alert-success', 'Perfil actualizado');

    }
}
