<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function lastInsertId(): int|string
    {
        return Book::latest()->first()->id ?? 0; // Retorna o ID do último livro criado, ou 0 se não houver nenhum.
    }

    public function save(array $data): bool
    {
        return Book::create($data) instanceof Book; // Retorna verdadeiro se o livro foi criado com sucesso.
    }

    public function all(): array
    {
        return Book::all()->toArray(); // Retorna todos os livros como um array.
    }

    public function findByID(int|string $id): Book|bool
    {
        return Book::find($id); // Retorna o livro correspondente ao ID, ou false se não encontrado.
    }

    public function update(array $data, int|string $id): bool
    {
        $book = Book::find($id);
        if ($book) {
            return $book->update($data); // Atualiza o livro se encontrado.
        }
        return false; // Retorna falso se o livro não foi encontrado.
    }

    public function delete(int|string $id): bool
    {
        $book = Book::find($id);
        return $book ? $book->delete() : false; // Deleta o livro se encontrado.
    }
}
