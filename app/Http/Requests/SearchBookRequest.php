<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchBookRequest extends FormRequest
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
            'query' => 'required|string|max:255',
        ];
    }
}