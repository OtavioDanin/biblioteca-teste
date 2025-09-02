<?php

declare(strict_types=1);

namespace Modules\Autores\Domain;

interface AutorRepositoryInterface
{
    public function getAll();
    public function persist(array $data);
    public function persistLivroAutor(array $data);
}
