<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    // Autoriza a requisição.
    public function authorize()
    {
        return true; 
    }

    // Define as regras de validação.
    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:books,isbn,' . $this->route('id'),
            'quantidade_paginas' => 'required|integer',
            'edicao' => 'required|string|max:20',
            'editora' => 'required|string|max:255',
        ];
    }
}