<?php

declare(strict_types=1);

namespace Rehor\Datastructure\DataStructure;

abstract class Structure
{
    abstract protected function put(string $item): self;

    abstract protected function getOne(): mixed;

    abstract protected function getAll(): iterable;
}