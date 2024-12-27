<?php

namespace App\UseCases\User;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

readonly class StoreUserCommandHandler
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function handle(StoreUserCommand $command): User
    {
        $user = new User();
        $user->name = $command->getName();
        $user->email = $command->getEmail();
        $user->password = Hash::make($command->getName());

        return $this->repository->save($user);
    }
}
