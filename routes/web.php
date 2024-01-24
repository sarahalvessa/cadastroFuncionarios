<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListarFuncionariosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ping', function () {
    return 'pong';
});

Route::get('/funcionarios', [ListarFuncionariosController::class, 'index'])->name('funcionarios.index');
Route::get('/funcionarios/create', [ListarFuncionariosController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios/store', [ListarFuncionariosController::class, 'store'])->name('funcionarios.store');

Route::get('/funcionarios/edit/{id}', [ListarFuncionariosController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/update/{id}', [ListarFuncionariosController::class, 'update'])->name('funcionarios.update');
Route::delete('/funcionarios/destroy/{id}', [ListarFuncionariosController::class, 'destroy'])->name('funcionarios.destroy');
