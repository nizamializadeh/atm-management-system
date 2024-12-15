<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('/accounts/{id}/withdraw', [AccountController::class, 'withdraw']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('/transactions/{id}', [TransactionController::class, 'deleteTransaction']);
    Route::post('/logout', [UserController::class, 'logout']);

});



