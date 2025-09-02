<?php

declare(strict_types=1);

namespace Modules\Assuntos\Domain;

interface AssuntoValidatorInterface
{
    public function validate(object $data): void;
}
