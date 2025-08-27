<?php

declare(strict_types=1);

namespace Modules\Livros\DTOs;

use Spatie\LaravelData\Data;

class LivroDTO extends Data
{
    public ?string $titulo;
    public ?string $valor;
    public ?string $editora;
    public ?string $edicao;
    public ?string $ano_publicacao;
    public ?array $autores;
    public ?array $assuntos;
}
