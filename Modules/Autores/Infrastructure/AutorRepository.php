<?php

declare(strict_types=1);

namespace Modules\Autores\Infrastructure;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Collection;
use Modules\Autores\Domain\AutorRepositoryInterface;

class AutorRepository implements AutorRepositoryInterface
{
    public function __construct(protected Autor $autor) {}

    public function getAll(): Collection
    {
        return $this->autor->orderBy('cod_au')->get();
    }
}
