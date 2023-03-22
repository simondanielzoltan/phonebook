<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;

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

Route::apiResource('user', UserController::class)->only([
    'store',
    'update',
    'destroy'
]);

Route::apiResource('email', EmailController::class)->only([
    'destroy'
]);

Route::apiResource('phone', PhoneController::class)->only([
    'destroy'
]);
