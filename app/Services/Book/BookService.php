<?php

namespace App\Services\Book;

use App\Models\Book;

class BookService
{
    // Método para retornar todos os livros
    public function getAllBooks()
    {
        return Book::all();
    }

    // Método para criar um novo livro
    public function createBook(array $data)
    {
        return Book::create($data);
    }

    // Método para obter um livro por ID
    public function getBookById($id)
    {
        return Book::findOrFail($id);
    }

    // Método para atualizar um livro existente
    public function updateBook($id, array $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    // Método para deletar um livro
    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }

    // Método para buscar livros por consulta
    public function searchBooks(string $query)
{
    $books = Book::where('titulo', 'like', '%' . $query . '%')
        ->orWhere('autor', 'like', '%' . $query . '%')
        ->orWhere('isbn', 'like', '%' . $query . '%')
        ->orWhere('editora', 'like', '%' . $query . '%')
        ->get();

    if ($books->isEmpty()) {
        return ResponseService::error('Nenhum livro encontrado com a consulta: ' . $query, 404);
    }

    return $books;
}
}