<?php

namespace Modules\Assuntos\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Modules\Assuntos\Application\AssuntoService;
use Modules\Assuntos\Domain\AssuntoRepositoryInterface;
use Modules\Assuntos\Domain\AssuntoServiceInterface;

class AssuntoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AssuntoRepositoryInterface::class, AssuntoRepository::class);
        $this->app->bind(AssuntoServiceInterface::class, AssuntoService::class);
    }

    public function boot(): void {}
}
