<?php

namespace App\Http\Controllers\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\RedirectResponse;
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


    /**
     * Exibe o formulário para criar um novo recurso.
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

    /**
     * Exibe o formulário para editar o recurso especificado.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
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
