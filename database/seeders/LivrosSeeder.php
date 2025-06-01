<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livros = [
            [
                'codl' => 1,
                'titulo' => 'Dom Casmurro',
                'editora' => 'Companhia das Letras',
                'edicao' => 1,
                'ano_publicacao' => '1899'
            ],
            [
                'codl' => 2,
                'titulo' => 'A Hora da Estrela',
                'editora' => 'Rocco',
                'edicao' => 3,
                'ano_publicacao' => '1977'
            ],
            [
                'codl' => 3,
                'titulo' => 'Harry Potter',
                'editora' => 'Bloomsbury',
                'edicao' => 1,
                'ano_publicacao' => '1997'
            ],
            [
                'codl' => 4,
                'titulo' => '1984',
                'editora' => 'Penguin',
                'edicao' => 2,
                'ano_publicacao' => '1949'
            ],
        ];

        foreach ($livros as $livro) {
            Livro::create($livro);
        }
    }
}
