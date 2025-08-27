<?php

declare(strict_types=1);

namespace Modules\Autores\UI\Http\Controllers;

use Modules\Autores\Domain\AutorServiceInterface;
use Modules\Shares\Infrastructure\LoggerFileTrait;
use Throwable;

class AutoresController extends Controller
{
    use LoggerFileTrait;

    public function __construct(protected AutorServiceInterface $autorService) {}

    public function index()
    {
        try {
            $autores = $this->autorService->getAllAutores();
            return view('autorx::autores.index', compact('autores'));
        } catch (Throwable $th) {
            $this->error("Message: " . $th->getMessage(), ['Metodo' => 'index', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }
}
