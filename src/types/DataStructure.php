<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types;

use Rehor\Datastructure\types\Stack\Stack;
use Rehor\Datastructure\types\Queue\Queue;

class DataStructure extends Structure
{
    private Stack|Queue $structureType;

    public function __construct(Stack|Queue $structureType)
    {
        $this->structureType = $structureType;
    }

    public function put(string $item): self
    {
        if (!is_null($this->structureType)) {
            get_class($this->structureType) === 'Rehor\Datastructure\types\Stack\Stack' ? $this->structureType->push($item) : $this->structureType->enqueue($item);
        }
        
        return $this;
    }

    public function get(): mixed
    {
        if (is_null($this->structureType)) {
            return null;
        }

        return get_class($this->structureType) === 'Rehor\Datastructure\types\Stack\Stack' ? $this->structureType->pop() : $this->structureType->dequeue();
    }
}