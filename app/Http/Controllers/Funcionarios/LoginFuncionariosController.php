<?php

namespace App\Http\Controllers\Funcionarios;

use Illuminate\Http\Request;

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
        return view('login_funcionarios');
    }

    public function store(Request $request): void
    {
        print_r($request->all());
    }
}
