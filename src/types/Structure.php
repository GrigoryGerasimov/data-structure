<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types;

abstract class Structure
{
    abstract protected function put(string $item): self;

    abstract protected function get(): mixed;
}