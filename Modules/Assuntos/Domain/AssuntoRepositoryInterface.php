<?php

declare(strict_types=1);

namespace Modules\Assuntos\Domain;

interface AssuntoRepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function update(int $id, array $data);
    public function persist(array $data);
    public function delete(int $id);
    public function isLinkedToBooks(int $id): bool;
}
