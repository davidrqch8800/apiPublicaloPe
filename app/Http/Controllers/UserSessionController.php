<?php

namespace App\Http\Controllers;

use App\Models\UserSession;
use App\Http\Requests\StoreUserSessionRequest;
use App\Http\Requests\UpdateUserSessionRequest;

class UserSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserSession::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserSessionRequest $request)
    {
        $data = UserSession::create($request->all());
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = UserSession::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSession $userSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserSessionRequest $request, $id)
    {
        $data = UserSession::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->update($request->all());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = UserSession::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->delete();
        return response()->json($data, 204);
    }
}
