<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\BibliotecaView;
use Illuminate\Database\Eloquent\Collection;

class BibliotecaViewRepository implements BibliotecaViewRepositoryInterface
{
    public function __construct(protected BibliotecaView $bibliotecaView) {}

    public function exportData(): Collection
    {
        return $this->bibliotecaView::orderBy('autor_nome')->get();
    }
}
