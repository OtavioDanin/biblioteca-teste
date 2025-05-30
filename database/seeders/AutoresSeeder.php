<?php

namespace Database\Seeders;

use App\Models\Autor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autores = [
            ['cod_au' => 1, 'nome' => 'Machado de Assis'],
            ['cod_au' => 2, 'nome' => 'Clarice Lispector'],
            ['cod_au' => 3, 'nome' => 'J.K. Rowling'],
            ['cod_au' => 4, 'nome' => 'George Orwell'],
        ];

        foreach ($autores as $autor) {
            Autor::create($autor);
        }
    }
}
