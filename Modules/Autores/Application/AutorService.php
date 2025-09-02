<?php

declare(strict_types=1);

namespace Modules\Autores\Application;

use Modules\Autores\Domain\AutorException;
use Modules\Autores\Domain\AutorRepositoryInterface;
use Modules\Autores\Domain\AutorServiceInterface;

class AutorService implements AutorServiceInterface
{
    public function __construct(protected AutorRepositoryInterface $autorRepository) {}

    public function getAllAutores(): array
    {
        $autores = $this->autorRepository->getAll();
        return $autores->toArray();
    }

    public function save(array $data)
    {
        if (empty($data)) {
            throw new AutorException('Não existe autor para ser inserido.', 400);
        }
        $this->autorRepository->persist($data);
    }

    public function saveLivroAutor(array $data): void
    {
        $hasPersist = $this->autorRepository->persistLivroAutor($data);
        if (!$hasPersist) {
            throw new AutorException('Falha ao inserir na tabela livro_autor.');
        }
    }
}
