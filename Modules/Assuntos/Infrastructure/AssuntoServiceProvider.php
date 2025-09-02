<?php

namespace Modules\Assuntos\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Modules\Assuntos\Application\AssuntoService;
use Modules\Assuntos\Application\AssuntoValidator;
use Modules\Assuntos\Domain\AssuntoRepositoryInterface;
use Modules\Assuntos\Domain\AssuntoRulesService;
use Modules\Assuntos\Domain\AssuntoRulesServiceInterface;
use Modules\Assuntos\Domain\AssuntoServiceInterface;
use Modules\Assuntos\Domain\AssuntoValidatorInterface;

class AssuntoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AssuntoRepositoryInterface::class, AssuntoRepository::class);
        $this->app->bind(AssuntoServiceInterface::class, AssuntoService::class);
        $this->app->bind(AssuntoValidatorInterface::class, AssuntoValidator::class);
        $this->app->bind(AssuntoRulesServiceInterface::class, AssuntoRulesService::class);
    }

    public function boot(): void
    {
        // Carrega as views específicas do módulo
        $this->loadViewsFrom(__DIR__ . '/../UI/resources/views', 'assuntox'); // 'assuntox' é o namespace das views
    }
}
