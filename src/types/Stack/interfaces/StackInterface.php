<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Stack\interfaces;

interface StackInterface
{
    public function push($item): void;

    public function pop();

    public function isStackEmpty(): bool;
}