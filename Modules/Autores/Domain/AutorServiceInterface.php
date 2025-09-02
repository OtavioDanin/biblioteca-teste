<?php

declare(strict_types=1);

namespace Modules\Autores\Domain;

interface AutorServiceInterface
{
    public function getAllAutores();
    public function save(array $data);
    public function saveLivroAutor(array $data);
}
