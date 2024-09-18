<?php

namespace Tests\UseCases\Book\FetchBooks;

use App\Repositories\BookRepository;
use App\UseCases\Book\FetchBooks\FetchBooksUseCase;
use PHPUnit\Framework\TestCase;

class FetchBooksUseCaseTest extends TestCase
{
    private $bookRepository;
    private $fetchBooksUseCase;

    protected function setUp(): void
    {
        $this->bookRepository = $this->createMock(BookRepository::class);
        $this->fetchBooksUseCase = new FetchBooksUseCase($this->bookRepository);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function shouldFetchAllBooks()
    {
        $books = [
            ['titulo' => 'Livro 1', 'autor' => 'Autor 1'],
            ['titulo' => 'Livro 2', 'autor' => 'Autor 2'],
        ];

        $this->bookRepository->expects($this->once())
            ->method('all')
            ->willReturn($books);

        $result = $this->fetchBooksUseCase->execute();

        $this->assertSame($books, $result);
    }
}
