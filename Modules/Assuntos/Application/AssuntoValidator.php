<?php

declare(strict_types=1);

namespace Modules\Assuntos\Application;

use Modules\Assuntos\Domain\AssuntoValidatorInterface;

class AssuntoValidator implements AssuntoValidatorInterface
{
    public function validate(object $data): void
    {
        $data->validate([
            'descricao' => 'required|string|max:20',
        ]);
    }
}
