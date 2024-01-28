<?php

namespace App\Http\Controllers\Funcionarios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginFuncionariosController
{
    /**
     * Exibe uma lista dos recursos.
     *
     * @return
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('login_funcionarios');
    }


    /**
     * Exibe o formulário para criar um novo recurso.
     *
     * @return string
     */
    public function create()
    {
        return "";
    }

    public function store(Request $request): void
    {
        print_r($request->all());

        $credentials = $request->only('email', 'password');

        // Verificar se o usuário existe no banco de dados
        if (Auth::validate($credentials)) {
            echo 'usuario autenticado';
        }
    }
}
