<?php

declare(strict_types=1);

namespace Modules\Shares\Domain;

interface LoggerInterface
{
    public function info(string $message, array $context = []);
    public function notice(string $message, array $context = []);
    public function warning(string $message, array $context = []);
    public function error(string $message, array $context = []);
    public function alert(string $message, array $context = []);
    public function emergency(string $message, array $context = []);
}
