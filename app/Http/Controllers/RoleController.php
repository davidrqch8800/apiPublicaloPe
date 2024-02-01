<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Role;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $roles = Role::all();
            return ApiResponse::success('Lista de Rol', 200, $roles);
            // throw new Exception("Error papito");
        } catch(Exception $e){
            return ApiResponse::error('Error al obtener la lista de roles: '.$e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'role_name' => 'required|string|unique:roles'
            ]);

            $role = Role::create($request->all());
            return ApiResponse::success('Rol creado exitosamente', 201, $role);
        } catch(ValidationException $e){
            return ApiResponse::error('Error de validacion: '.$e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try{
            $role = Role::findOrFail($id);
            return ApiResponse::success('Rol obtenido exitosamente', 200, $role);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Rol no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $role = Role::findOrFail($id);
            $request->validate([
                'role_name' => ['required', Rule::unique('roles')->ignore($role)]
            ]);

            $role -> update($request->all());
            return ApiResponse::success('Rol actualizado exitosamente', 200, $role);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Rol no encontrado: '.$e->getMessage(), 404);
        } catch(Exception $e){
            return ApiResponse::error('Error: '.$e-> getMessage(), 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $role = Role::findOrFail($id);
            $role->delete();
            return ApiResponse::success('Rol eliminado exitosamente', 200);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Rol no encontrado: '.$e->getMessage(), 404);
        }
    }
}
