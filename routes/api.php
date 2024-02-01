<?php

use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSessionController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('role', RoleController::class);
Route::apiResource('payment', PaymentController::class);
Route::apiResource('user', UserController::class);

Route::apiResource('event', EventController::class);
Route::apiResource('event-category', EventCategoryController::class);

Route::apiResource('organizer', OrganizerController::class);

Route::apiResource('registration', RegistrationController::class);
Route::get('registration/{id}/pdf', [RegistrationController::class, "report"]);

Route::apiResource('ticket', TicketController::class);

Route::apiResource('user-session-controller', UserSessionController::class);

Route::apiResource('role-permission', RolePermissionController::class);