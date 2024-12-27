<?php

namespace App\Core\UseCases\User\Store;

use App\Core\Models\User;
use App\Core\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

readonly class StoreUserCommandHandler
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function handle(StoreUserCommand $command): User
    {
        $user = User::new(
            $command->getName(),
            $command->getEmail(),
            Hash::make($command->getName())
        );

        return $this->repository->save($user);
    }
}
