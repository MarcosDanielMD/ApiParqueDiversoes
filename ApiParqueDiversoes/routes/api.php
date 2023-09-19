<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Http\Controllers\Api\BrinquedosController;
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

Route::get(
    '/',function(){
        return response()->json([
            'Succes'=> true
        ]);
}
);

Route::get('/brinquedo', [BrinquedosController::class,'index']);
Route::get('/brinquedo/{id}',[BrinquedosController::class,'show']);
Route::post('/brinquedo',[BrinquedosController::class,'store']);
Route::delete('/brinquedo/{id}',[BrinquedosController::class,'destroy']);
Route::put('/brinquedo/{id}',[BrinquedosController::class,'update']);
