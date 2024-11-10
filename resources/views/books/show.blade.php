<!-- resources/views/books/show.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>{{ $book->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>

<body>
    <div class="container">
        <h1>{{ $book->title }}</h1>
        @if ($book->image)
            <img src="{{ asset('storage/' . $book->image) }}" alt="Imagem do Livro" class="book-image">
        @endif
        <p><strong>Autor:</strong> <br> {{ $book->author }}</p>
        <p><strong>Ano de Publicação:</strong> <br>{{ $book->publication_year }}</p>
        <p><strong>Sinopse:</strong></p>
        <p class="justificado">{{ $book->description }}</p>
        <br>
        <div class="button-group">
            <a href="{{ route('books.edit', $book->id) }}" class="btn">Editar</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">Deletar</button>
            </form>
            <a href="{{ route('books.index') }}" class="btn">Voltar</a>
        </div>

        <br><br>
    </div>
</body>

</html>
