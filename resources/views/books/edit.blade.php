<!-- resources/views/books/edit.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <div class="container">
        <h1>Editar Livro</h1>
        <!-- resources/views/books/edit.blade.php -->
        <!-- resources/views/books/edit.blade.php -->
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Importante para indicar que é um UPDATE -->

            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>

            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>

            <label for="publication_year">Ano de Publicação:</label>
            <input type="number" id="publication_year" name="publication_year"
                value="{{ old('publication_year', $book->publication_year) }}" required>

            <label for="genre">Gênero:</label>
            <select id="genre" name="genre" required>
                <option value="Ficção" {{ old('genre', $book->genre) == 'Ficção' ? 'selected' : '' }}>Ficção</option>
                <option value="Romance" {{ old('genre', $book->genre) == 'Romance' ? 'selected' : '' }}>Romance</option>
                <option value="Aventura" {{ old('genre', $book->genre) == 'Aventura' ? 'selected' : '' }}>Aventura
                </option>
                <option value="Mistério" {{ old('genre', $book->genre) == 'Mistério' ? 'selected' : '' }}>Mistério
                </option>
                <option value="Fantasia" {{ old('genre', $book->genre) == 'Fantasia' ? 'selected' : '' }}>Fantasia
                </option>
                <option value="Histórico" {{ old('genre', $book->genre) == 'Histórico' ? 'selected' : '' }}>Histórico
                </option>
                <option value="Biografia" {{ old('genre', $book->genre) == 'Biografia' ? 'selected' : '' }}>Biografia
                </option>
                <option value="Autoajuda" {{ old('genre', $book->genre) == 'Autoajuda' ? 'selected' : '' }}>Autoajuda
                </option>
            </select>

            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required>{{ old('description', $book->description) }}</textarea>

            <label for="image">Imagem do Livro:</label>
            <input type="file" id="image" name="image">

            <button type="submit" class="btn">Salvar Alterações</button>
            <a href="{{ route('books.index') }}" class="btn">Cancelar</a>
        </form>

    </div>
</body>

</html>
