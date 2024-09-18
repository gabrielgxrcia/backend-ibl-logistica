<?php

namespace Tests\UseCases\Book\CreateBook;

use App\Repositories\BookRepository;
use App\UseCases\Book\CreateBook\CreateBookUseCase;
use PHPUnit\Framework\TestCase;

class CreateBookUseCaseTest extends TestCase
{
    private $bookRepository;
    private $createBookUseCase;

    protected function setUp(): void
    {
        $this->bookRepository = $this->createMock(BookRepository::class);
        $this->createBookUseCase = new CreateBookUseCase($this->bookRepository);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function shouldCreateBook()
    {
        $data = [
            'titulo' => 'Meu livro',
            'autor' => 'Gabriel Garcia',
            'isbn' => '1234567890123',
            'quantidade_paginas' => 300,
            'edicao' => '1',
            'editora' => 'Editora A',
        ];

        $this->bookRepository->expects($this->once())
            ->method('save')
            ->with($data)
            ->willReturn(true);

        $result = $this->createBookUseCase->execute($data);

        $this->assertTrue($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
public function shouldNotCreateBookWhenRepositoryFails()
{
    $data = [
        'titulo' => 'Meu livro',
        'autor' => 'Gabriel Garcia',
        'isbn' => '1234567890123',
        'quantidade_paginas' => 300,
        'edicao' => '1st',
        'editora' => 'IBL',
    ];

    $this->bookRepository->expects($this->once())
        ->method('save')
        ->with($data)
        ->willReturn(false);

    $this->expectException(\Exception::class);
    $this->expectExceptionMessage("Sorry, we couldn't create the book. Please try again.");

    $this->createBookUseCase->execute($data);
}
}