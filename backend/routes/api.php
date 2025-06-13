<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaidController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Test endpoint
Route::get('/test', function () {
    return response()->json([
        'message' => 'Hello from Laravel API!',
        'timestamp' => now()->toIso8601String(),
    ]);
});

Route::get('/maids', [MaidController::class, 'index']);
Route::get('/maids/{id}', [MaidController::class, 'show']);
Route::post('/maids', [MaidController::class, 'store']); 