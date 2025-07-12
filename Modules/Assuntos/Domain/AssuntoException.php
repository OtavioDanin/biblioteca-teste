<?php

declare(strict_types=1);

namespace Modules\Assuntos\Domain;

use Exception;

class AssuntoException extends Exception
{
    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
