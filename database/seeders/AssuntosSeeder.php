<?php

namespace Database\Seeders;

use App\Models\Assunto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssuntosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $assuntos = [
            ['cod_as' => 1, 'descricao' => 'Ficção'],
            ['cod_as' => 2, 'descricao' => 'Técnico'],
            ['cod_as' => 3, 'descricao' => 'Biografia'],
            ['cod_as' => 4, 'descricao' => 'História'],
        ];

        foreach ($assuntos as $assunto) {
            Assunto::create($assunto);
        }
    }
}
