<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AutorRepositoryInterface;

class AutorService implements AutorServiceInterface
{
    public function __construct(protected AutorRepositoryInterface $autorRepository) {}

    public function getAllAutores(): array
    {
        $autores = $this->autorRepository->getAll();
        return $autores->toArray();
    }
}
