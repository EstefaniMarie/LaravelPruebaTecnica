<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Vista principal de la interfaz user
    public function index()
    {

        return view('users.index');
    }

    //Crear usuario cumpliendo las restricciones
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'correo' => 'required|email',
            'password' => 'required|min:8',
            'roles_id' => 'required|exists:roles,id',
        ]);

        try {
            User::create($validatedData);
            return redirect()->route('user')->with('success', 'Usuario creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error']);
        }
    }

    //Aqui hacemos la transformacion de recursos de User
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    //Editar y actualizar un user creado
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.editar', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user')->with('success', 'Usuario actualizado exitosamente');
    }

    //Eliminar un usuario. Solo lo tiene permitido admin con roles = 1
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Usuario eliminado correctamente.');
    }

}
