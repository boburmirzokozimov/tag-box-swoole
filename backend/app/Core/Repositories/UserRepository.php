<?php

namespace App\Core\Repositories;

use App\Core\Models\User;

final class UserRepository implements UserRepositoryInterface
{

    public function save(User $model): User
    {
        $model->save();
        return $model;
    }

    public function find(int $id): ?User
    {
        return User::query()->find($id);
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
