<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::get('/users', function () {
    return response()->json([
        'users' => User::all(),
    ], 200);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('labs', [RoomController::class, 'index']);
    Route::post('labs', [RoomController::class, 'store']);
    Route::get('labs/{id}', [RoomController::class, 'show']);
    Route::put('labs/{id}', [RoomController::class, 'update']);
    Route::delete('labs/{id}', [RoomController::class, 'destroy']);
    Route::apiResource('bookings', App\Http\Controllers\Api\LabBookingController::class);
});
