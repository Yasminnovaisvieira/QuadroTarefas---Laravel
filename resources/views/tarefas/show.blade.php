<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>{{ $tarefa->titulo }}</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
</head>

<body>
    <div class="container">
        <h1>{{ $tarefa->titulo }}</h1>
        
        <p><strong>Matéria:</strong> <br> {{ $tarefa->materia }}</p>
        <p><strong>Data de Vencimento:</strong> <br>{{ \Carbon\Carbon::parse($tarefa->vencimento)->format('d/m/Y') }}</p>
        
        <p><strong>Descrição:</strong></p>
        <p class="justificado">{{ $tarefa->descricao }}</p>
        
        <br>
        <div class="button-group">
            <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn">Editar</a>
            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">Deletar</button>
            </form>
            <a href="{{ route('tarefas.index') }}" class="btn">Voltar</a>
        </div>

        <br><br>
    </div>
</body>

</html>
