<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::query();
        if ($request->order && $request->order_by) {
            $order = $request->order == 'asc' ? 'asc' : 'desc';
            $query->orderBy($request->order_by, $order);
        }

        if ($request->limit) {
            $query->limit($request->limit);
        }

        // Date from only for created_at`
        $from = Carbon::createFromFormat('m-d-Y', $request->from ?? '00-00-0000')->startOfDay()->format('Y-m-d\TH:i:s.000000\Z');
        $before = Carbon::createFromFormat('m-d-Y', $request->before ?? '00-00-0000')->endOfDay()->format('Y-m-d\TH:i:s.000000\Z');
        if ($request->from && $request->before) {
            $query->whereBetween('created_at', [$from, $before]);
        } else if ($request->from) {
            $query->where('created_at', '>=', $from);
        } else if ($request->before) {
            $query->where('created_at', '<=', $before);
        }

        if ($request->paginate && $request->paginate === 'yes') {
            $per_page = $request->per_page ?? 10;
            $result = $query->paginate($per_page);
            return response()->json(compact('result'));
        }

        $result = [
            'data' => $query->get(),
            'paginate' => false,
        ];
        return response()->json(compact('result'));
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
    public function store(StoreEventRequest $request)
    {
        $data = Event::create($request->all());
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Event::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $data = Event::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->update($request->all());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Event::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->delete();
        return response()->json($data, 204);
    }
}
