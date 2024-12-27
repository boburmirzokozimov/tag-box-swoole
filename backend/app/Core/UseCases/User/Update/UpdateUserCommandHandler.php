<?php

namespace Core\UseCases\User\Update;

use Core\Exceptions\User\UserNotFoundException;
use Core\Models\User;
use Core\Repositories\UserRepositoryInterface;
use Core\Tasks\User\FindUserByIdTask;

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
