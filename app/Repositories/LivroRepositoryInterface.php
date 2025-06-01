<?php

declare(strict_types=1);

namespace App\Repositories;

interface LivroRepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function persist(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}