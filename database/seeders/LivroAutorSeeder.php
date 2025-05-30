<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivroAutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relacoes = [
            ['livro_codl' => 1, 'autor_cod_au' => 1], 
            ['livro_codl' => 2, 'autor_cod_au' => 2], 
            ['livro_codl' => 3, 'autor_cod_au' => 3], 
            ['livro_codl' => 4, 'autor_cod_au' => 4],
        ];

        DB::table('livro_autor')->insert($relacoes);
    }
}
