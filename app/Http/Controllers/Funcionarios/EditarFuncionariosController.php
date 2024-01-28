<?php

namespace App\Http\Controllers\Funcionarios;

use App\Models\Funcionario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EditarFuncionariosController
{
    /**
     * Exibe o formulário para editar o recurso especificado.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $funcionarios = Funcionario::findOrFail($id);
        return view('editar_funcionarios', ['funcionarios' => $funcionarios]);
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cargo_id' => 'sometimes|required|exists:cargos,cargo_id',
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());
        return redirect()->route('funcionarios.index');
    }
}
