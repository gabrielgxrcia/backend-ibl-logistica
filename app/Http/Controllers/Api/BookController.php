<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\SearchBookRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    // Retorna todos os livros.
    public function index(): JsonResponse
    {
        return response()->json(Book::all());
    }

    // Cria um novo livro.
    public function store(StoreBookRequest $request): JsonResponse
{
    try {
        $book = Book::create($request->validated());
        return response()->json($book, 201);
    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->getCode() == 23000) { 
            return response()->json(['message' => 'ISBN já cadastrado.'], 409);
        }
        return response()->json(['message' => 'Erro ao criar o livro.', 'error' => $e->getMessage()], 500);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Erro ao criar o livro.', 'error' => $e->getMessage()], 500);
    }
}

    // Retorna um livro específico.
    public function show($id): JsonResponse
    {
        try {
            $book = Book::findOrFail($id);
            return response()->json($book);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Livro não encontrado.'], 404);
        }
    }

    // Atualiza um livro específico.
    public function update(UpdateBookRequest $request, $id): JsonResponse
    {
        try {
            $book = Book::findOrFail($id);
            $book->update($request->validated());
            return response()->json($book);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Livro não encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar o livro.'], 500);
        }
    }

    // Exclui um livro.
    public function destroy($id): JsonResponse
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Livro não encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao excluir o livro.'], 500);
        }
    }

    // Busca livros com base em uma consulta.
    public function search(SearchBookRequest $request): JsonResponse
    {
        $query = $request->input('query');
        $books = Book::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('titulo', 'like', "%$query%")
                ->orWhere('autor', 'like', "%$query%")
                ->orWhere('isbn', 'like', "%$query%")
                ->orWhere('edicao', 'like', "%$query%")
                ->orWhere('editora', 'like', "%$query%");
        })->get();

        return response()->json($books);
    }
}