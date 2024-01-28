<?php

use App\Http\Controllers\Funcionarios\ListarFuncionariosController;
use App\Http\Controllers\Funcionarios\LoginFuncionariosController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return 'pong';
});
Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::prefix('/funcionarios')->namespace('Funcionarios')->group(function () {
    Route::group(['prefix' => '/login'], function () {
        Route::get('/index', [LoginFuncionariosController::class, 'index'])->name('funcionarios.login.index');
    });

    Route::group(['prefix' => '/listar'], function () {
        Route::get('/index', [ListarFuncionariosController::class, 'index'])->name('funcionarios.index');
        Route::get('/create', [ListarFuncionariosController::class, 'create'])->name('funcionarios.create');
        Route::post('/store', [ListarFuncionariosController::class, 'store'])->name('funcionarios.store');
        Route::get('/edit/{id}', [ListarFuncionariosController::class, 'edit'])->name('funcionarios.edit');
        Route::put('/update/{id}', [ListarFuncionariosController::class, 'update'])->name('funcionarios.update');
        Route::delete('/destroy/{id}', [ListarFuncionariosController::class, 'destroy'])->name('funcionarios.destroy');
    });
});
