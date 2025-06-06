<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class LivroException extends Exception
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}