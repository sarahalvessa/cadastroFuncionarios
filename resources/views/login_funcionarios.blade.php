<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div>
    <h1>Login</h1>
    <form action="{{ route('funcionarios.login.store') }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
