<?php

namespace App\Repository;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected User $user)
    {
    }

    public function getAll(): Collection
    {
        return $this->user::all();
    }

    public function getById($id)
    {
        return $this->user::where('id', $id)->get();
    }

    public function getByFieldName(string $field, string $value)
    {
        return $this->user::where($field, $value)->get();
    }

    public function delete($id): int
    {
        return $this->user::destroy($id);
    }

    public function create(array $data)
    {
        return $this->user::create($data);
    }

    public function update($id, array $data): bool
    {
        $user = $this->getById($id);
        $user->fill($data);
        return $this->user::save();
    }
}
