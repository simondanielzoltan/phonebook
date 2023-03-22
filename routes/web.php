<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('table', ['users' => User::all()]);
});


Route::get('/user/create', function () {
    return view('user-form');
});


Route::get('/user/{id}', function (string $id) {
    return view('user-form', ['user' => User::find($id)]);
});