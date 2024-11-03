<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\Logado;
use App\Http\Middleware\NaoLogado;
use Illuminate\Support\Facades\Route;

// NÃO LOGADOS
Route::middleware(NaoLogado::class)->group(function(){
    // rotas para não logados
    Route::get('/', [AuthController::class, 'login'])->name('login');

    Route::post('/valida_login', [AuthController::class, 'valida_login'])->name('valida_login');

    Route::get('/criar_conta', function () {
        return view('criar_conta');
    })->name('criar_conta');

    Route::post('/valida_conta', [AuthController::class, 'valida_conta'])->name('valida_conta');

});

// LOGADOS
Route::middleware(Logado::class)->group(function(){
    // rotas para logados
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/cad_aluno', [MainController::class, 'cad_aluno'])->name('cad_aluno');
    Route::post('/cad_aluno_submit', [MainController::class, 'cad_aluno_submit'])->name('cad_aluno_submit');

    Route::get('buscar_aluno', [MainController::class, 'buscar_aluno'])->name('buscar_aluno');
    Route::post('buscar_aluno_submit', [MainController::class, 'buscar_aluno_submit'])->name('buscar_aluno_submit');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

