<?php

namespace Core\Repositories;

use Core\Models\User;

interface UserRepositoryInterface
{
    public function save(User $model): User;

    public function find(int $id): ?User;

    public function delete(User $user): void;
}
