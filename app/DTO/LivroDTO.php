<?php

declare(strict_types=1);

namespace App\DTO;

readonly class LivroDTO
{
    public function create(array $data): array
    {
        return [
            'titulo' => $data['titulo'],
            'editora' => $data['editora'],
            'edicao' => $data['edicao'],
            'ano_publicacao' => $data['anoPublicacao'],
            'autores' => $data['autores'],
            'assuntos' => $data['assuntos'],
        ];
    }
}
