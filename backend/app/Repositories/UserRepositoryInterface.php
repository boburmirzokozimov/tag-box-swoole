<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function save(User $model): User;
}
