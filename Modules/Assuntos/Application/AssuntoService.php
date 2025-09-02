<?php

declare(strict_types=1);

namespace Modules\Assuntos\Application;

use Modules\Assuntos\Domain\AssuntoException;
use Modules\Assuntos\Domain\AssuntoServiceInterface;
use Modules\Assuntos\Domain\AssuntoRepositoryInterface;

class AssuntoService implements AssuntoServiceInterface
{
    public function __construct(protected AssuntoRepositoryInterface $assuntoRepository) {}

    public function getAllAssuntos(): array
    {
        $assuntos = $this->assuntoRepository->getAll();
        return $assuntos->toArray();
    }

    public function findById(int $id): array
    {
        $assunto = $this->assuntoRepository->findById($id);
        if(!isset($assunto)){
            throw new AssuntoException ('Livro não encontrado.');
        }
        return $assunto->toArray();
    }

    public function update(int $id, array $assuntoData): void
    {
        if (empty($assuntoData)) {
            throw new AssuntoException('Dados de assunto vazio para atualizar.', 400);
        }
        $this->assuntoRepository->update($id, $assuntoData);
    }

    public function save(array $data): void
    {
        if (empty($data)) {
            throw new AssuntoException('Não existe assunto para ser inserido.', 400);
        }
        $this->assuntoRepository->persist($data);
    }

    public function destroy(int $id): void
    {
        $this->assuntoRepository->delete($id);
    }

    public function saveAssuntoAutor(array $data): void
    {
        $hasPersist = $this->assuntoRepository->persistLivroAssunto($data);
        if(!$hasPersist) {
            throw new AssuntoException('Falha ao inserir na tabela livro_assunto');
        }
    }
}
