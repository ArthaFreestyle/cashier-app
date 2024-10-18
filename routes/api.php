<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/rolePermission',[ApiController::class,'getPermissions']);

Route::post('/roleName',[ApiController::class,'getName']);

Route::post('/menuName',[ApiController::class,'getMenu']);
