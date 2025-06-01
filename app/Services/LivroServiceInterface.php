<?php

declare(strict_types=1);

namespace App\Services;

interface LivroServiceInterface
{
    public function getAllLivros();
    public function save(array $data);
    public function find(int $id);
    public function update(int $id, array $data);
    public function destroy(int $id);
}