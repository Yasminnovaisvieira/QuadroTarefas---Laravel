<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Exibe a lista de livros, com funcionalidade de busca.
     */
    // BookController.php
    public function index(Request $request)
    {
        $query = $request->input('search'); // Pega o valor do campo de busca

        // Verifica se existe um termo de busca
        if ($query) {
            // Filtra os livros pelo termo de busca
            $books = Book::where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->get();
        } else {
            // Caso contrário, retorna todos os livros
            $books = Book::all();
        }

        return view('books.index', compact('books'));
    }


    /**
     * Exibe o formulário de criação de um novo livro.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Armazena um novo livro no banco de dados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publication_year' => 'required|numeric',
            'genre' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cria um novo livro
        $book = new Book();
        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->publication_year = $validated['publication_year'];
        $book->genre = $validated['genre'];
        $book->description = $validated['description'];

        // Verifica se a imagem foi enviada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        // Salva o novo livro
        $book->save();

        // Redireciona de volta para a lista de livros
        return redirect()->route('books.index');
    }

    /**
     * Exibe os detalhes de um livro.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id); // Encontra o livro pelo ID
        return view('books.show', compact('book'));
    }

    /**
     * Exibe o formulário de edição de um livro.
     */
    // Método para exibir o formulário de edição
    public function edit($id)
    {
        $book = Book::findOrFail($id); // Encontra o livro pelo ID
        return view('books.edit', compact('book')); // Passa o livro para a view de edição
    }



    /**
     * Atualiza as informações de um livro.
     */

    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publication_year' => 'required|numeric',
            'genre' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = Book::findOrFail($id); // Encontra o livro pelo ID
        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->publication_year = $validated['publication_year'];
        $book->genre = $validated['genre'];
        $book->description = $validated['description'];

        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('image')) {
            // Deleta a imagem antiga se houver
            if ($book->image) {
                Storage::delete('public/' . $book->image);
            }

            // Salva a nova imagem
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        // Salva os dados atualizados no banco de dados
        $book->save();

        // Redireciona para a página de listagem de livros
        return redirect()->route('books.index');
    }


    /**
     * Deleta um livro do banco de dados.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Deleta a imagem se existir
        if ($book->image && Storage::exists('public/' . $book->image)) {
            Storage::delete('public/' . $book->image);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso!');
    }
}
