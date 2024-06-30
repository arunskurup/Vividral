<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ListController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::group([ 'middleware' => 'api', 'prefix' => 'auth' ], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
});
Route::group([ 'middleware' => 'api', 'prefix' => 'logedin' ], function ($router) {
    Route::get('/list', [ListController::class, 'Index'])->middleware(['auth:sanctum']);
});