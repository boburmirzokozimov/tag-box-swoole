<?php

namespace Core\UseCases\Tag\Store;

use Core\Checkers\Tag\TagNameUniqueCheckerInterface;
use Core\Models\Tag\Tag;
use Core\Repositories\Tag\TagRepositoryInterface;

final readonly class StoreTagCommandHandler
{
    public function __construct(
        private TagRepositoryInterface        $repository,
        private TagNameUniqueCheckerInterface $checker)
    {
    }

    public function handle(StoreTagCommand $command): Tag
    {
        $this->checker->check($command->getName());

        $tag = Tag::new(
            $command->getName(),
            $command->getDescription(),
            $command->getType(),
            1
        );

        return $this->repository->save($tag);
    }
}
