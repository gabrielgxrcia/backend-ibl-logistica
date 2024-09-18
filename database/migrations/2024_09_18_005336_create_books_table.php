<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); 
            $table->string('titulo')->comment('Título do livro'); 
            $table->string('autor')->comment('Autor do livro'); 
            $table->string('isbn', 13)->unique()->comment('ISBN do livro'); 
            $table->integer('quantidade_paginas')->comment('Quantidade de páginas do livro'); 
            $table->string('edicao')->comment('Edição do livro'); 
            $table->string('editora')->comment('Editora do livro'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
