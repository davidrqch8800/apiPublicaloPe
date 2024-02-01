<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Registration::all();
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
    public function store(StoreRegistrationRequest $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        if (!$ticket) {
            return response()->json(['message' => 'No se encontro ningun ticket'], 404);
        }

        if ($ticket->availability <= 0) {
            return response()->json(['message' => 'No hay mas entradas disponibles para este ticket'], 400);
        }

        $data = Registration::create($request->all());

        $ticket->decrement('availability');

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Registration::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationRequest $request, $id)
    {
        $data = Registration::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->update($request->all());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Registration::find($id);
        if (!$data) return response()->json(['message' => $this->messages["notFound"]], 404);
        $data->delete();
        return response()->json($data, 204);
    }

    /**
     * Generate SaleTicket
     */
    public function report($id)
    {
        // $data = Registration::find($id);
        try {
            $data = Registration::with('ticket')
                ->with('user')
                ->with('event')
                ->with('payment')
                ->where('id', '=', $id)
                ->get();
        } catch (\Throwable $th) {
            // throw $th;
            return "<h1>Venta no econtrada<h1>";
        }

        // return view('registrations.report', compact('data'));
        $pdf = Pdf::loadView('registrations.report', compact('data'));
        return $pdf->stream('sale.pdf');
    }
}
