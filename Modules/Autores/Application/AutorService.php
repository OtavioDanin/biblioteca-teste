<?php

declare(strict_types=1);

namespace Modules\Autores\Application;

use Modules\Autores\Domain\AutorRepositoryInterface;
use Modules\Autores\Domain\AutorServiceInterface;

class AutorService implements AutorServiceInterface
{
    public function __construct(protected AutorRepositoryInterface $autorRepository) {}

    public function getAllAutores(): array
    {
        $autores = $this->autorRepository->getAll();
        return $autores->toArray();
    }
}
