<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livro_autor', function (Blueprint $table) {
            $table->bigInteger('livro_codl');
            $table->bigInteger('autor_cod_au');
            
            $table->foreign('livro_codl')
                  ->references('codl')
                  ->on('livros')
                  ->onDelete('cascade');
                  
            $table->foreign('autor_cod_au')
                  ->references('cod_au')
                  ->on('autores')
                  ->onDelete('cascade');
                  
            $table->primary(['livro_codl', 'autor_cod_au']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_autor');
    }
};
