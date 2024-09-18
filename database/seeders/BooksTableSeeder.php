<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'titulo' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'autor' => 'J.R.R. Tolkien',
                'isbn' => '9788532522016',
                'quantidade_paginas' => 423,
                'edicao' => '1ª Edição',
                'editora' => 'HarperCollins',
            ],
            [
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'isbn' => '9788535921570',
                'quantidade_paginas' => 368,
                'edicao' => '2ª Edição',
                'editora' => 'Companhia das Letras',
            ],
            [
                'titulo' => 'Dom Casmurro',
                'autor' => 'Machado de Assis',
                'isbn' => '9788520914105',
                'quantidade_paginas' => 320,
                'edicao' => '5ª Edição',
                'editora' => 'Nova Fronteira',
            ],
            [
                'titulo' => 'O Pequeno Príncipe',
                'autor' => 'Antoine de Saint-Exupéry',
                'isbn' => '9788501031020',
                'quantidade_paginas' => 96,
                'edicao' => '1ª Edição',
                'editora' => 'Agir',
            ],
            [
                'titulo' => 'A Revolução dos Bichos',
                'autor' => 'George Orwell',
                'isbn' => '9788573023493',
                'quantidade_paginas' => 144,
                'edicao' => '3ª Edição',
                'editora' => 'Companhia das Letras',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}