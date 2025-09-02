<?php

declare(strict_types=1);

namespace Modules\Autores\Infrastructure;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Collection;
use Modules\Autores\Domain\AutorRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AutorRepository implements AutorRepositoryInterface
{
    const TABLE_ASSOCIATIVE = 'livro_autor';

    public function __construct(protected Autor $autor) {}

    public function getAll(): Collection
    {
        return $this->autor->orderBy('cod_au')->get();
    }

    public function persist(array $data): Autor
    {
        return $this->autor->create($data);
    }

    public function persistLivroAutor(array $data): bool
    {
        return DB::table(self::TABLE_ASSOCIATIVE)->insert($data);
    }
}
