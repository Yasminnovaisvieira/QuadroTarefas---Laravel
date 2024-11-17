<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <div class="container">
        <h1>Adicionar Tarefa</h1>
        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf
        
            <label for="titulo">Título da Tarefa:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required>{{ old('descricao') }}</textarea>

            <label for="materia">Matéria:</label>
            <input type="text" id="materia" name="materia" value="{{ old('materia') }}" required>

            <label for="vencimento">Data de Vencimento:</label>
            <input type="date" id="vencimento" name="vencimento" value="{{ old('vencimento') }}" required>

            <button type="submit" class="btn">Salvar</button>
            <a href="{{ route('tarefas.index') }}" class="btn">Cancelar</a>
        </form>
    </div>
</body>

</html>
