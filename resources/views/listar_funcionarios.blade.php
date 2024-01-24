<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Funcionarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('lib/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Listagem de Funcionários</h1>
    <div class="row mb-3">
        <div class="col-md-6">
            <form method="get" action="{{ route('funcionarios.index') }}" class="form-inline">
                <label for="departamentod_id" class="mr-2">Departamento:</label>
                <select id="departamentod_id" name="departamento_id" class="form-control mr-2" required>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->departamento_id }}">{{ $departamento->nome }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
        </div>
    </div>

    @if(request('departamento_id'))
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($funcionariosDepartamentos as $funcionariosDepartamento)
                <tr>
                    <td>{{ $funcionariosDepartamento->func_id }}</td>
                    <td>{{ $funcionariosDepartamento->nome }}</td>
                    <td>{{ $funcionariosDepartamento->data_nascimento }}</td>
                    <td>{{ $funcionariosDepartamento->cargo->nome }}</td>
                    <td>{{ $funcionariosDepartamento->cargo->departamento->nome }}</td>
                    <td>{{ $funcionariosDepartamento->created_at }}</td>
                    <td>{{ $funcionariosDepartamento->updated_at }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionariosDepartamento->func_id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('funcionarios.destroy', $funcionariosDepartamento->func_id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esse funcionário?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Voltar</a>
    @else
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->func_id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->data_nascimento }}</td>
                    <td>{{ $funcionario->cargo->nome }}</td>
                    <td>{{ $funcionario->cargo->departamento->nome }}</td>
                    <td>{{ $funcionario->created_at }}</td>
                    <td>{{ $funcionario->updated_at }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->func_id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('funcionarios.destroy', $funcionario->func_id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esse funcionário?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('funcionarios.create') }}" class="btn btn-success">Adicionar</a>
    @endif
</div>
<script src="{{ asset('lib/js/bootstrap.js') }}"></script>
</body>
</html>
