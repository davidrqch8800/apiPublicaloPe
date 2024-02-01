<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = EventCategory::all();
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
    public function store(StoreEventCategoryRequest $request)
    {
        $data = EventCategory::create($request->all());
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = EventCategory::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventCategoryRequest $request, $id)
    {
        $data = EventCategory::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->update($request->all());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = EventCategory::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->delete();
        return response()->json($data, 204);
    }
}
