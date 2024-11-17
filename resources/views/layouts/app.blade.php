<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadro de Tarefas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <a href="{{ route('tarefas.index') }}" class="logo">Quadro de Tarefas</a>
                <ul class="nav-links">
                    <li><a href="{{ route('tarefas.index') }}">Início</a></li>
                    <li><a href="{{ route('tarefas.create') }}">Adicionar Tarefa</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Quadro de Tarefas. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>

</html>
