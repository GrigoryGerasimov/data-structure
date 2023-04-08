<?php

declare(strict_types=1);

namespace Rehor\Datastructure\DataStructure;

abstract class Structure
{
    abstract protected function put(string $item): self;

    abstract protected function getOne();

    abstract protected function getAll(): iterable;

    abstract protected function contains($item): bool;

    abstract protected function isEmpty(): bool;
}