<?php

namespace App\UseCases\Book\CreateBook;

use App\Repositories\BookRepository;

class CreateBookUseCase
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function execute(array $data)
{
    if (!$this->bookRepository->save($data)) {
        throw new \Exception("Sorry, we couldn't create the book. Please try again.");
    }
    return true; // Ou retorne um valor que faça sentido para a sua lógica.
}
}
