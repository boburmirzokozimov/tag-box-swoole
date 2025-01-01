<?php

namespace Core\Tasks\User;

use Core\Exceptions\User\UserNotFoundException;
use Core\Models\User;
use Core\Repositories\User\UserRepositoryInterface;

final readonly class FindUserByIdTask
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function run(int $id): User
    {
        $user = $this->repository->find($id);

        if (!$user) {
            throw new UserNotFoundException("User not found");
        }

        return $user;
    }
}
