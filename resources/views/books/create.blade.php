<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <div class="container">
        <h1>Adicionar Livro</h1>
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" required>

            <label for="publication_year">Ano de Publicação:</label>
            <input type="number" id="publication_year" name="publication_year" required>

            <label for="genre">Gênero:</label>
            <select id="genre" name="genre" required>
                <option value="">Selecione o gênero</option>
                <option value="Ficção">Ficção</option>
                <option value="Romance">Romance</option>
                <option value="Aventura">Aventura</option>
                <option value="Mistério">Mistério</option>
                <option value="Fantasia">Fantasia</option>
                <option value="Histórico">Histórico</option>
                <option value="Biografia">Biografia</option>
                <option value="Autoajuda">Autoajuda</option>
                <!-- Adicione mais gêneros conforme necessário -->
            </select>

            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="image">Imagem do Livro:</label>
            <input type="file" id="image" name="image">

            <button type="submit" class="btn">Salvar</button>
            <a href="{{ route('books.index') }}" class="btn">Cancelar</a>
        </form>
    </div>
</body>

</html>
