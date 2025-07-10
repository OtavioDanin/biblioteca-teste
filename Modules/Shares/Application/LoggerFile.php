<?php

namespace Modules\Shares\Application;

use Illuminate\Support\Facades\Log;
use Modules\Shares\Domain\LoggerInterface;
use Throwable;

class LoggerFile implements LoggerInterface
{

    public function info(string $message, array $context = []): void
    {
        try {
            Log::info($message, $context);
        } catch (Throwable) {
        }
    }

    public function notice(string $message, array $context = []): void
    {
        try {
            Log::notice($message, $context);
        } catch (Throwable) {
        }
    }

    public function warning(string $message, array $context = []): void
    {
        try {
            Log::warning($message, $context);
        } catch (Throwable) {
        }
    }

    public function error(string $message, array $context = []): void
    {
        try {
            Log::error($message, $context);
        } catch (Throwable) {
        }
    }

    public function alert(string $message, array $context = []): void
    {
        try {
            Log::alert($message, $context);
        } catch (Throwable) {
        }
    }

    public function emergency(string $message, array $context = []): void
    {
        try {
            Log::alert($message, $context);
        } catch (Throwable) {
        }
    }
}