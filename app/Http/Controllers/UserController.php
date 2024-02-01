<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try{
            $users = User::all();
            return ApiResponse::success('Lista de Usuarios', 200, $users);
        } catch(Exception $e){
            return ApiResponse::error('Error al obtener la lista de usuarios: '.$e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'username' => 'required|string|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'role_id' => 'required|exists:roles,id'
            ]);

            $user = User::create($request->all());
            return ApiResponse::success('Uuario creado exitosamente', 201, $user);
        } catch(ValidationException $e){
            return ApiResponse::error('Error de validacion: '.$e->getMessage(), 422);
        }
    }

    public function show($id)
    {
        try{
            $user = User::findOrFail($id);
            return ApiResponse::success('Usuario obtenido exitosamente', 200, $user);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Usuario no encontrado', 404);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $user = User::findOrFail($id);
            $request->validate([
                'username' => ['required', Rule::unique('users')->ignore($user)],
                'email' => ['required', Rule::unique('users')->ignore($user)],
                'password' => 'string',
                'first_name' => 'string',
                'last_name' => 'string',
                'role_id' => 'exists:roles,id'
            ]);

            $user -> update($request->all());
            return ApiResponse::success('Usuario actualizado exitosamente', 200, $user);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Usuario no encontrado: '.$e->getMessage(), 404);
        } catch(Exception $e){
            return ApiResponse::error('Error: '.$e-> getMessage(), 422);
        }
    }

    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
            return ApiResponse::success('Usuario eliminado exitosamente', 200);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Usuario no encontrado: '.$e->getMessage(), 404);
        }
    }
}
