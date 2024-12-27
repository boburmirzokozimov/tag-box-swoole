<?php

namespace App\Core\UseCases\User\Delete;

use App\Core\Exceptions\User\UserNotFoundException;
use App\Core\Repositories\UserRepositoryInterface;
use App\Core\Tasks\User\FindUserByIdTask;

final readonly class DeleteUserCommandHandler
{
    public function __construct(
        private FindUserByIdTask        $findUserByIdTask,
        private UserRepositoryInterface $userRepository
    )
    {
    }

    /**
     * @throws UserNotFoundException
     */
    public function handle(int $id): void
    {
        $user = $this->findUserByIdTask->run($id);
        $this->userRepository->delete($user);
    }
}
