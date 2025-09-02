<?php

declare(strict_types=1);

namespace Modules\Autores\Domain;

use Exception;
use Throwable;

class AutorException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
