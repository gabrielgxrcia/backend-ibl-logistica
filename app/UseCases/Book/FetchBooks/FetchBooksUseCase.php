<?php

namespace App\UseCases\Book\FetchBooks;

use App\Repositories\BookRepository;

class FetchBooksUseCase
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function execute()
    {
        return $this->bookRepository->all();
    }
}
