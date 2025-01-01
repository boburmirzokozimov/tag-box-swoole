<?php

namespace Core\Repositories\Tag;

use Core\Models\Tag\Tag;

interface TagRepositoryInterface
{
    public function save(Tag $model): Tag;

    public function find(int $id): ?Tag;

    public function delete(Tag $model): void;

    public function isUnique(string $tagName): bool;
}
