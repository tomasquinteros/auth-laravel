<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function getByFieldName(string $field, string $value);
    public function delete($id);
    public function create(array $data);
    public function update($id, array $data);
}
