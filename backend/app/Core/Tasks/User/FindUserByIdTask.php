<?php

namespace App\Core\Tasks\User;

use App\Core\Exceptions\User\UserNotFoundException;
use App\Core\Models\User;
use App\Core\Repositories\UserRepositoryInterface;

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
