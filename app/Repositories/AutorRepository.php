<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Collection;

class AutorRepository implements AutorRepositoryInterface
{
    public function __construct(protected Autor $autor) {}

    public function getAll(): Collection
    {
        return $this->autor->orderBy('cod_au')->get();
    }
}
