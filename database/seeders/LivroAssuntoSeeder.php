<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LivroAssuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relacoes = [
            ['livro_codi' => 1, 'assunto_cod_as' => 1], // Dom Casmurro - Ficção
            ['livro_codi' => 2, 'assunto_cod_as' => 1], // Hora da Estrela - Ficção
            ['livro_codi' => 3, 'assunto_cod_as' => 1], // Harry Potter - Ficção
            ['livro_codi' => 4, 'assunto_cod_as' => 1], // 1984 - Ficção
            ['livro_codi' => 4, 'assunto_cod_as' => 4], // 1984 - História
        ];

        DB::table('livro_assunto')->insert($relacoes);
    }
}
