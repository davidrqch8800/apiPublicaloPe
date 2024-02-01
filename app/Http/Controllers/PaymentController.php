<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

use App\Http\Responses\ApiResponse;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        try{
            $payments = Payment::all();
            return ApiResponse::success('Lista de Pagos', 200, $payments);
        } catch(Exception $e){
            return ApiResponse::error('Error al obtener la lista de pagos: '.$e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'amount' => 'required|numeric',
                'transaction_date' => 'required|date',
                'payment_method' => 'nullable|string',
                'status' => 'required|in:pending,completed,failed',
            ]);

            $payment = Payment::create($request->all());
            return ApiResponse::success('Pago creado exitosamente', 201, $payment);
        } catch(ValidationException $e){
            return ApiResponse::error('Error de validacion: '.$e->getMessage(), 422);
        }
    }

    public function show($id)
    {
        try{
            $payment = Payment::findOrFail($id);
            return ApiResponse::success('Pago obtenido exitosamente', 200, $payment);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Pago no encontrado', 404);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $payment = Payment::findOrFail($id);
            $request->validate([
                'amount' => 'required|numeric',
                'transaction_date' => 'required|date',
                'payment_method' => 'nullable|string',
                'status' => 'required|in:pending,completed,failed'
            ]);

            $payment -> update($request->all());
            return ApiResponse::success('Pago actualizado exitosamente', 200, $payment);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Pago no encontrado: '.$e->getMessage(), 404);
        } catch(Exception $e){
            return ApiResponse::error('Error: '.$e-> getMessage(), 422);
        }
    }

    public function destroy($id)
    {
        try{
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return ApiResponse::success('Pago eliminado exitosamente', 200);
        } catch(ModelNotFoundException $e){
            return ApiResponse::error('Pago no encontrado: '.$e->getMessage(), 404);
        }
    }
}
