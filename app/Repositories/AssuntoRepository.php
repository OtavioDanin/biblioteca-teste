<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Collection;

class AssuntoRepository implements AssuntoRepositoryInterface
{
    public function __construct(protected Assunto $assunto) {}

    public function getAll(): Collection
    {
        return $this->assunto->orderBy('cod_as')->get();
    }
}