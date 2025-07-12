<?php

declare(strict_types=1);

namespace Modules\Assuntos\DTOs;

use Spatie\LaravelData\Data;

class AssuntoDTO extends Data
{
    public ?string $descricao;
}
