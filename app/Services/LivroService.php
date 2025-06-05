<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\LivroException;
use App\Repositories\LivroRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LivroService implements LivroServiceInterface
{
    public function __construct(protected LivroRepositoryInterface $livroRepository) {}

    public function getAllLivros(): array
    {
        $allLivros = $this->livroRepository->getAll();
        return $allLivros->toArray();
    }

    public function save(array $livroData): void
    {
        if (empty($livroData)) {
            throw new LivroException('Não existe livro para ser inserido.', 500);
        }
        DB::transaction(function () use ($livroData) {
            $livro =  $this->livroRepository->persist($livroData);
            $livro->autores()->attach($livroData['autores']);
            $livro->assuntos()->attach($livroData['assuntos']);
        });
    }

    public function find(int $id): array
    {
        $livro = $this->livroRepository->findById($id);
        $dataArray = $livro->toArray();
        if (empty($dataArray)) {
            throw new LivroException('Livro não encontrado.', 404);
        }
        return $dataArray;
    }

    public function update(int $id, array $livroData): void
    {
        if (empty($livroData)) {
            throw new LivroException('Não há livros para atualizar.', 500);
        }
        DB::transaction(function () use ($id, $livroData) {
            $livro =  $this->livroRepository->update($id, $livroData);
            $livro->autores()->sync($livroData['autores']);
            $livro->assuntos()->sync($livroData['assuntos']);
        });
    }

    public function destroy(int $id): void
    {
        DB::transaction(function () use ($id) {
            $livro = $this->livroRepository->delete($id);
            $livro->autores()->detach();
            $livro->assuntos()->detach();
        });
    }
}
