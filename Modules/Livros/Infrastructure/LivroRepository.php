<?php

declare(strict_types=1);

namespace Modules\Livros\Infrastructure;

use Modules\Livros\Domain\Livro;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Livros\Domain\LivroRepositoryInterface;

class LivroRepository implements LivroRepositoryInterface
{
    public function __construct(protected Livro $livro) {}

    public function getAll(): LengthAwarePaginator
    {
        return $this->livro::with(['autores', 'assuntos'])->orderBy('codl', 'desc')->paginate(15);
    }

    public function findById(int $id): ?Livro
    {
        return $this->livro::with(['autores', 'assuntos'])->find($id);
    }

    public function persist(array $data): Livro
    {
        return $this->livro->create($data);
    }

    public function update(int $id, array $data): Livro
    {
        $livro = $this->findById($id);
        $livro->update($data);
        return $livro;
    }

    public function delete(int $id): Livro
    {
        $livro = $this->findById($id);
        $livro->delete();
        return $livro;
    }
}
