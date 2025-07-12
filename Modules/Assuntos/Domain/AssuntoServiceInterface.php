<?php

namespace Modules\Assuntos\Domain;

interface AssuntoServiceInterface
{
    public function getAllAssuntos();
    public function findById(int $id);
    public function update(int $id, array $data);
    public function save(array $data);
    public function destroy(int $id);
}
