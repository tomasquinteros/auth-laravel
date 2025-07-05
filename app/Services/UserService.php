<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServicesInterface;
use Exception;
use Illuminate\Http\Request;

class UserService implements UserServicesInterface
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws Exception
     */
    public function getAll()
    {
        $users = $this->userRepository->getAll()->toArray();

        if (empty($users)) {
            throw new Exception('Users not found', 404);
        }
        return $users;
    }

    /**
     * @throws Exception
     */
    public function getById(string $id)
    {
        $user = $this->userRepository->getById($id)->toArray();

        if (empty($user)) {
            throw new Exception('User not found', 404);
        }
        return $user;
    }

    /**
     * @throws Exception
     */
    public function delete(string $id): bool
    {
        $delete = $this->userRepository->delete($id);
        if ($delete === 0) {
            throw new Exception('Error, cannot destroy user.', 500);
        }

        return true;
    }

    /**
     * @throws Exception
     */
    public function create(UserRequest $data)
    {
        $userCreated = $this->userRepository->create($data->validated());

        if (empty($userCreated)) {
            throw new Exception('Error, cannot create user.');
        }

        return $userCreated;
    }

    /**
     * @throws Exception
     */
    public function update($id, Request $data)
    {
        $userUpdated = $this->userRepository->update($id, $data->all());

        if (empty($userUpdated)) {
            throw new Exception('Error, cannot update user.');
        }

        return $userUpdated;
    }
}
