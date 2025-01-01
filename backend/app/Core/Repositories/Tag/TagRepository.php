<?php

namespace Core\Repositories\Tag;

use Core\Models\Tag\Tag;

final readonly class TagRepository implements TagRepositoryInterface
{

    public function save(Tag $model): Tag
    {
        $model->save();
        return $model;
    }

    public function find(int $id): ?Tag
    {
        return Tag::find($id);
    }

    public function delete(Tag $model): void
    {
        $model->delete();
    }

    public function isUnique(string $tagName): bool
    {
        return Tag::where('name', $tagName)->exists();
    }
}
