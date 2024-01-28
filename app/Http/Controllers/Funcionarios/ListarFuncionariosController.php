<?php

namespace App\Http\Controllers\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controlador para listar funcionários.
 */
class ListarFuncionariosController extends Controller
{
    /**
     * Exibe uma lista dos recursos.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $departamentos = Departamento::all();

        $funcionarios = Funcionario::with('cargo.departamento');

        if ($request->has('departamento_id')) {
            $departamentoId = $request->input('departamento_id');

            $funcionarios->whereHas('cargo.departamento', function ($query) use ($departamentoId) {
                $query->where('departamento_id', $departamentoId);
            });

            return view('listar_funcionarios', [
                'funcionariosDepartamentos' => $funcionarios->get(),
                'departamentos' => $departamentos,
            ]);
        }

        return view('listar_funcionarios', [
            'funcionarios' => $funcionarios->get(),
            'departamentos' => $departamentos,
        ]);
    }
}
