<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <div class="container">
        <h1>Editar Tarefa</h1>
        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="titulo">Título da Tarefa:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $tarefa->titulo) }}" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required>{{ old('descricao', $tarefa->descricao) }}</textarea>

            <label for="materia">Matéria:</label>
            <input type="text" id="materia" name="materia" value="{{ old('materia', $tarefa->materia) }}" required>

            <label for="vencimento">Data de Vencimento:</label>
            <input type="date" id="vencimento" name="vencimento" value="{{ old('vencimento', $tarefa->vencimento) }}" required>

            <button type="submit" class="btn">Salvar Alterações</button>
            <a href="{{ route('tarefas.index') }}" class="btn">Cancelar</a>
        </form>
    </div>
</body>

</html>
