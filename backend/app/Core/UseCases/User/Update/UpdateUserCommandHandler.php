<?php

namespace App\Core\UseCases\User\Update;

use App\Core\Exceptions\User\UserNotFoundException;
use App\Core\Models\User;
use App\Core\Repositories\UserRepositoryInterface;
use App\Core\Tasks\User\FindUserByIdTask;

final readonly class UpdateUserCommandHandler
{
    public function __construct(
        private FindUserByIdTask        $findUserByIdTask,
        private UserRepositoryInterface $repository)
    {
    }

    /**
     * @throws UserNotFoundException
     */
    public function handle(int $id, UpdateUserCommand $command): User
    {
        $user = $this->findUserByIdTask->run($id);

        $user->changePassword($command->getPassword())
            ->changEmail($command->getEmail());

        return $this->repository->save($user);
    }
}
