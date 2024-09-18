<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use App\Exceptions\HandleExceptions;

trait ExceptionHandlerTrait
{
    // Método para tratar exceções.
    protected function tryCatch(callable $callback): JsonResponse
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            return HandleExceptions::handle($e);
        }
    }
}
