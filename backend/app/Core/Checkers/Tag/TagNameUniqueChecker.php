<?php

namespace Core\Checkers\Tag;

use Core\Exceptions\Tag\TagNameShouldBeUniqueException;
use Core\Repositories\Tag\TagRepositoryInterface;

class TagNameUniqueChecker implements TagNameUniqueCheckerInterface
{
    public function __construct(
        private readonly TagRepositoryInterface $repository
    )
    {
    }

    /**
     * @throws TagNameShouldBeUniqueException
     */
    public function check(string $tagName): void
    {
        $exists = $this->repository->isUnique($tagName);

        if ($exists) {
            throw new TagNameShouldBeUniqueException("Tag '$tagName' already exists");
        }
    }
}
