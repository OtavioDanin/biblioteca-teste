<?php

declare(strict_types=1);

namespace Modules\Assuntos\Domain;

interface AssuntoRulesServiceInterface
{
    public function validateRuleDelete(int $id): void;
}
