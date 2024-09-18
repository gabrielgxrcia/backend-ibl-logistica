<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class SearchBookRequest extends FormRequest
{
    // Autoriza todas as requisições
    public function authorize(): bool
    {
        return true;
    }

    // Define as regras de validação
    public function rules(): array
    {
        return [
            'query' => 'required|string|max:255',
        ];
    }
}