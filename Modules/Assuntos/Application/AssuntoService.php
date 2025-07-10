<?php

declare(strict_types=1);

namespace Modules\Assuntos\Application;

use Modules\Assuntos\Domain\AssuntoServiceInterface;
use Modules\Assuntos\Domain\AssuntoRepositoryInterface;

class AssuntoService implements AssuntoServiceInterface
{
    public function __construct(protected AssuntoRepositoryInterface $assuntoRepository) {}

    public function getAllAssuntos(): array
    {
        $assuntos = $this->assuntoRepository->getAll();
        return $assuntos->toArray();
    }
}
