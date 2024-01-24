<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Funcionários</title>
    <link href="{{ asset('lib/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1 class="mb-0">Cadastrar Funcionários</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('funcionarios.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cargo_id">Cargo:</label>
                            <select id="cargo_id" name="cargo_id" class="form-control" required>
                                @foreach($cargos as $cargo)
                                    <option value="{{ $cargo->cargo_id }}">{{ $cargo->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="lib/bootstrap/bootstrap.js"></script>
<script src="{{ asset('lib/js/bootstrap.js') }}"></script>
</body>
</html>
