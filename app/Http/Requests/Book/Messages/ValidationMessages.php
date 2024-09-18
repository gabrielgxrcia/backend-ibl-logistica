<?php

namespace App\Http\Requests\Book\Messages;

class ValidationMessages
{
    // Retorna mensagens de validação
    public static function getMessages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'autor.required' => 'O campo autor é obrigatório.',
            'isbn.required' => 'O campo ISBN é obrigatório.',
            'isbn.max' => 'O campo ISBN não deve ter mais de 13 caracteres.',
            'isbn.unique' => 'O ISBN já existe.',
            'quantidade_paginas.required' => 'O campo quantidade de páginas é obrigatório.',
            'quantidade_paginas.integer' => 'A quantidade de páginas deve ser um número inteiro.',
            'edicao.required' => 'O campo edição é obrigatório.',
            'editora.required' => 'O campo editora é obrigatório.',
        ];
    }
}
