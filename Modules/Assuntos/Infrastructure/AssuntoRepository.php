<?php

declare(strict_types=1);

namespace Modules\Assuntos\Infrastructure;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Collection;
use Modules\Assuntos\Domain\AssuntoRepositoryInterface;

class AssuntoRepository implements AssuntoRepositoryInterface
{
    public function __construct(protected Assunto $assunto) {}

    public function getAll(): Collection
    {
        return $this->assunto->orderBy('cod_as')->get();
    }

    public function findById(int $id): ?Assunto
    {
        return $this->assunto->find($id);
    }

    public function update(int $id, $data): bool
    {
        $assunto = $this->findById($id);
        return $assunto->updateOrFail($data);
    }

    public function persist(array $data): Assunto
    {
        return $this->assunto::create($data);
    }

    public function delete(int $id): ?bool
    {
        $assunto = $this->findById($id);
        return $assunto->deleteOrFail();
    }

    public function isLinkedToBooks(int $id): bool
    {
        return $this->assunto::find($id)->livros()->exists();
    }
}
