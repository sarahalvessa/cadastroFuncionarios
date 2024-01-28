<?php

namespace App\Http\Controllers\Funcionarios;

use App\Models\Funcionario;
use Illuminate\Http\RedirectResponse;

class DeletarFuncionariosController
{

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('funcionarios.index');
    }
}
