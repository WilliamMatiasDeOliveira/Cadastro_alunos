<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// rotas para não logados
Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/valida_login', [AuthController::class, 'valida_login'])->name('valida_login');

Route::get('/criar_conta', function () {
    return view('criar_conta');
})->name('criar_conta');
Route::post('/valida_conta', [AuthController::class, 'valida_conta'])->name('valida_conta');



// rotas para logados
Route::get('/home', function () {
    return view('home');
})->name('home');

