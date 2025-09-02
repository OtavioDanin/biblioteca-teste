<?php

declare(strict_types=1);

namespace Modules\Livros\Application;

use Modules\Assuntos\Domain\AssuntoServiceInterface;
use Modules\Autores\Domain\AutorServiceInterface;
use Modules\Livros\Domain\LivroProcessingServiceInterface;
use Modules\Livros\Domain\LivroServiceInterface;
use Illuminate\Support\Facades\DB;

class LivroProcessingService implements LivroProcessingServiceInterface
{
    public function __construct(
        protected LivroServiceInterface $livroService,
        protected AutorServiceInterface $autorService,
        protected AssuntoServiceInterface $assuntoService,
    ) {}

    public function save(array $data): void
    {
        DB::transaction(function () use ($data) {
            $livro = $this->livroService->save($data);

            $autores = array_map(function ($valor) use ($livro) {
                return ['livro_codl' => $livro->codl, 'autor_cod_au' => $valor];
            }, $data['autores']);

            $assuntos = array_map(function ($valor) use ($livro) {
                return ['livro_codl' => $livro->codl, 'assunto_cod_as' => $valor];
            }, $data['assuntos']);

            $this->autorService->saveLivroAutor($autores);
            $this->assuntoService->saveAssuntoAutor($assuntos);
        });
    }
}
