<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthapiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthapiController::class, 'login']);
Route::post('logout', [AuthapiController::class, 'logout'])->middleware('auth:sanctum');
Route::post('registers', [AuthapiController::class, 'register']);
Route::post('update-profile', [AuthapiController::class, 'updateafterregister'])->middleware('auth:sanctum');
