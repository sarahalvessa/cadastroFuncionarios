<?php

use App\Http\Controllers\Funcionarios\CadastrarFuncionariosController;
use App\Http\Controllers\Funcionarios\DeletarFuncionariosController;
use App\Http\Controllers\Funcionarios\EditarFuncionariosController;
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
        Route::get('/create', [LoginFuncionariosController::class, 'create'])->name('funcionarios.login.create');
        Route::post('/store', [LoginFuncionariosController::class, 'store'])->name('funcionarios.login.store');
    });

    Route::group(['prefix' => '/listar'], function () {
        Route::get('/index', [ListarFuncionariosController::class, 'index'])->name('funcionarios.index');
    });

    Route::group(['prefix' => '/cadastrar'], function () {
        Route::get('/create', [CadastrarFuncionariosController::class, 'create'])->name('funcionarios.cadastrar.create');
        Route::post('/store', [CadastrarFuncionariosController::class, 'store'])->name('funcionarios.cadastrar.store');
    });

    Route::group(['prefix' => '/editar'], function () {
        Route::get('/edit/{id}', [EditarFuncionariosController::class, 'edit'])->name('funcionarios.editar.edit');
        Route::put('/update/{id}', [EditarFuncionariosController::class, 'update'])->name('funcionarios.editar.update');
    });

    Route::group(['prefix' => '/deletar'], function () {
        Route::delete('/destroy/{id}', [DeletarFuncionariosController::class, 'destroy'])->name('funcionarios.deletar.destroy');
    });
});
