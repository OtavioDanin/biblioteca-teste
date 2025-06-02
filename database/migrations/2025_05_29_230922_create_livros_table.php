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
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('codl');
            $table->string('titulo', 40);
            $table->decimal('valor', 8, 2)->default(0.00);
            $table->string('editora', 40);
            $table->integer('edicao');
            $table->string('ano_publicacao', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
