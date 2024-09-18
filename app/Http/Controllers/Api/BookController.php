<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Requests\Book\SearchBookRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use App\Services\Book\BookService;
use App\Services\Book\ResponseService;
use App\Traits\ExceptionHandlerTrait;

class BookController extends Controller
{
    // Usar o trait para tratamento de exceções
    use ExceptionHandlerTrait; 

    // Serviço de livro
    protected $bookService;

    // Construtor para injeção de dependência
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    // Listar todos os livros
    public function index(): JsonResponse
    {
        return $this->tryCatch(function () {
            $books = $this->bookService->getAllBooks();
            return ResponseService::success($books);
        });
    }

    // Criar um novo livro
    public function store(StoreBookRequest $request): JsonResponse
    {
        return $this->tryCatch(function () use ($request) {
            $book = $this->bookService->createBook($request->validated());
            return ResponseService::success($book, 201);
        });
    }

    // Exibir um livro específico por ID
    public function show($id): JsonResponse
    {
        return $this->tryCatch(function () use ($id) {
            $book = $this->bookService->getBookById($id);
            return ResponseService::success($book);
        });
    }

    // Atualizar um livro existente ou específico por ID
    public function update(UpdateBookRequest $request, $id): JsonResponse
    {
        return $this->tryCatch(function () use ($request, $id) {
            $book = $this->bookService->updateBook($id, $request->validated());
            return ResponseService::success($book);
        });
    }

    // Deletar livro
    public function destroy($id): JsonResponse
    {
        return $this->tryCatch(function () use ($id) {
            $this->bookService->deleteBook($id);
            return ResponseService::success(null, 204);
        });
    }

    // Buscar livros por parâmetro
    public function search(SearchBookRequest $request): JsonResponse
    {
        return $this->tryCatch(function () use ($request) {
            $books = $this->bookService->searchBooks($request->input('query'));
            return ResponseService::success($books);
        });
    }
}
