<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\Book\Messages\ValidationMessages;

class UpdateBookRequest extends FormRequest
{
    // Autoriza todas as requisções
    public function authorize(): bool
    {
        return true;
    }

    // Define as regras de validação
    public function rules(): array
    {
        return [
            'titulo' => 'sometimes|required|string|max:255',
            'autor' => 'sometimes|required|string|max:255',
            'isbn' => 'sometimes|required|string|max:13|unique:books,isbn,' . $this->route('id'),
            'quantidade_paginas' => 'sometimes|required|integer',
            'edicao' => 'sometimes|required|string|max:20',
            'editora' => 'sometimes|required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    // Utiliza método para retornar mensagens de validação
    public function messages(): array
    {
        return ValidationMessages::getMessages();
    }

    // Trata falhas de validação
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => 'Dados inválidos.',
            'messages' => $validator->errors(),
        ], 422));
    }
}