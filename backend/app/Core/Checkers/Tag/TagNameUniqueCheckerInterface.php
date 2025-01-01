<?php

namespace Core\Checkers\Tag;

interface TagNameUniqueCheckerInterface
{
    public function check(string $tagName): void;
}
