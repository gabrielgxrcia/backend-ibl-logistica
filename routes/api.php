<?php

use App\Http\Controllers\Api\BookController;
use Illuminate\Support\Facades\Route;

// Rotas para gerenciar livros
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('Book.index'); 
    Route::post('/', [BookController::class, 'store'])->name('Book.store'); 
    Route::get('/{id}', [BookController::class, 'show'])->name('Book.show'); 
    Route::put('/{id}', [BookController::class, 'update'])->name('Book.update'); 
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('Book.destroy'); 
});

// Rota para pesquisar livros
Route::get('/search', [BookController::class, 'search'])->name('Book.search');