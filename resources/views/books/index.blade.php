<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca BookYas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Cabeçalho -->
    <header class="site-header">
        <div class="container">
            <h1>BookYas</h1>
            <p>Explore uma coleção de livros incríveis, encontre seus favoritos e descubra novos lançamentos!</p>
        </div>
    </header>

    <section class="book-section">
        <div class="container">

            <!-- Barra de Busca -->
            <div class="search-section">
                <form action="{{ route('books.index') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Buscar por título ou autor..."
                        value="{{ request()->input('search') }}">
                    <button type="submit">Buscar</button>
                </form>
                <br><br>
            </div>

            <!-- Lista de Livros -->
            <div class="book-list">
                <div class="book-list-header">
                    <h2>Livros</h2>
                </div>
                <br><br>
                <div class="books">
                    @foreach ($books as $book)
                        <div class="book-card">
                            @if ($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                                    class="book-image">
                            @endif
                            <div class="book-details">
                                <h3>{{ $book->title }}</h3>
                                <p><strong>Autor:</strong> {{ $book->author }}</p>
                                <p><strong>Gênero:</strong> {{ $book->genre }}</p>
                                <p><strong>Ano:</strong> {{ $book->publication_year }}</p>
                                <a href="{{ route('books.show', $book->id) }}" class="btn-details">Ver Detalhes</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <!-- Adicionar Novo Livro -->
                <div class="add-book-btn">
                    <a href="{{ route('books.create') }}" class="btn-add-book">Adicionar Novo Livro</a>
                </div>
                <br>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="site-footer">
        <div class="container">
            <p>&copy; 2024 BookYas. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Script -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
