<?php

namespace App\Http\Controllers\Funcionarios;

use App\Http\Controllers\Request;

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

}
