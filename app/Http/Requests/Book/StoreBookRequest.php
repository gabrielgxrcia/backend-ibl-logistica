<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\Book\Messages\ValidationMessages;

class StoreBookRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:books,isbn',
            'quantidade_paginas' => 'required|integer',
            'edicao' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
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