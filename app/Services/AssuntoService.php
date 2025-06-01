<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AssuntoRepositoryInterface;

class AssuntoService implements AssuntoServiceInterface
{
    public function __construct(protected AssuntoRepositoryInterface $assuntoRepository) {}

    public function getAllAssuntos(): array
    {
        $assuntos = $this->assuntoRepository->getAll();
        return $assuntos->toArray();
    }
}
