<?php

namespace App\Repositories;

use App\Models\User;

final class UserRepository implements UserRepositoryInterface
{

    public function save(User $model): User
    {
        $model->save();
        return $model;
    }
}
