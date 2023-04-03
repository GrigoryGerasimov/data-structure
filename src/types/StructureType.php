<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types;

use Rehor\Datastructure\Node;

abstract class StructureType
{
    abstract public function getFirst(): ?Node;
}