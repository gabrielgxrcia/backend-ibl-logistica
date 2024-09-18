<?php

namespace App\Services\Book;

use Illuminate\Http\JsonResponse;

class ResponseService
{
    // Método para retornar sucesso
    public static function success($data, int $status = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ], $status);
    }

    // Método para retornar erro
    public static function error(string $message, int $status = 400, $errors = null): JsonResponse
    {
        $response = [
            'error' => $message,
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $status);
    }
}