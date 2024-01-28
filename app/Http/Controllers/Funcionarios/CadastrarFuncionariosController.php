<?php

namespace App\Http\Controllers\Funcionarios;

use App\Models\Cargo;
use App\Models\Funcionario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CadastrarFuncionariosController
{
    /**
     * Exibe a view de cadastrar.
     *
     * @return View
     */
    public function create(): View
    {
        $cargos = Cargo::all();
        return view('cadastrar_funcionarios', ['cargos' => $cargos]);
    }

    /**
     * Armazena um recurso recém-criado no armazenamento.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cargo_id' => 'required|exists:cargos,cargo_id',
        ]);
        Funcionario::create($request->all());
        return redirect()->route('funcionarios.index');
    }
}
