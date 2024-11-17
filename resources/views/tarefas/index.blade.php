<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Tarefas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Cabeçalho -->
    <header class="site-header">
        <div class="container">
            <h1>Gestão de Tarefas</h1>
            <p>Organize suas tarefas de forma fácil e eficiente. Não perca nenhum prazo!</p>
        </div>
    </header>

    <section class="task-section">
        <div class="container">

            <div class="search-section">
                <form action="{{ route('tarefas.index') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Buscar por título ou matéria..."
                        value="{{ request()->input('search') }}">
                    <button type="submit">Buscar</button>
                </form>
                <br><br>
            </div>

            <div class="task-list">
                <div class="task-list-header">
                    <h2>Tarefas</h2>
                </div>
                <br><br>
                <div class="tasks">
                    @foreach ($tarefas as $tarefa)
                        <div class="task-card">
                            <div class="task-details">
                                <h3>{{ $tarefa->titulo }}</h3>
                                <p><strong>Matéria:</strong> {{ $tarefa->materia }}</p>
                                <p><strong>Vencimento:</strong> {{ \Carbon\Carbon::parse($tarefa->vencimento)->format('d/m/Y') }}</p>
                                <p><strong>Descrição:</strong> {{ Str::limit($tarefa->descricao, 100) }}</p>
                                <a href="{{ route('tarefas.show', $tarefa->id) }}" class="btn-details">Ver Detalhes</a>
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn-edit">Editar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>

                <div class="add-task-btn">
                    <a href="{{ route('tarefas.create') }}" class="btn-add-task">Adicionar Nova Tarefa</a>
                </div>
                <br>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; 2024 Gestão de Tarefas. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
