<?php

declare(strict_types=1);

namespace Modules\Livros\Domain;

interface LivroProcessingServiceInterface
{
    public function save(array $data);
}
