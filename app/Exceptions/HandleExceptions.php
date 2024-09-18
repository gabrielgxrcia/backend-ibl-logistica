<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\Book\ResponseService;

class HandleExceptions
{
    // Método para tratar exceções.
    public static function handle(\Throwable $exception): JsonResponse
    {
        // Log do erro para referência
        \Log::error('Erro: ' . $exception->getMessage(), [
            'stack' => $exception->getTraceAsString(),
            'code' => $exception->getCode(),
        ]);

        // Tratamento de validação.
        if ($exception instanceof ValidationException) {
            return ResponseService::error('Dados de entrada inválidos.', 422, $exception->validator->errors());
        }

        // Tratamento para método não permitido.
        if ($exception instanceof MethodNotAllowedHttpException) {
            return ResponseService::error('Método não permitido', 405);
        }

        // Tratamento para modelo não encontrado.
        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            return ResponseService::error('Livro não encontrado', 404);
        }

        // Tratamento específico para exclusão.
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return ResponseService::error('Livro não encontrado para exclusão.', 404);
        }

        // Tratamento genérico para outros erros.
        return ResponseService::error('Ocorreu um erro inesperado', 500);
    }
}
