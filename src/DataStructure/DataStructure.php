<?php

declare(strict_types=1);

namespace Rehor\Datastructure\DataStructure;

use Rehor\Datastructure\types\Stack\Stack;
use Rehor\Datastructure\types\Queue\Queue;

class DataStructure extends Structure
{
    private Stack|Queue $structureType;

    public function __construct(Stack|Queue $structureType)
    {
        $this->structureType = $structureType;
    }

    public function put(mixed $item): self
    {
        if (!is_null($this->structureType)) {
            get_class($this->structureType) === 'Rehor\Datastructure\types\Stack\Stack' ? $this->structureType->push($item) : $this->structureType->enqueue($item);
        }
        
        return $this;
    }

    public function getOne(): mixed
    {
        if (is_null($this->structureType)) {
            return null;
        }

        return get_class($this->structureType) === 'Rehor\Datastructure\types\Stack\Stack' ? $this->structureType->pop() : $this->structureType->dequeue();
    }

    public function getAll(): iterable
    {
        $currentNode = $this->structureType->getFirst();

        while (!is_null($currentNode)) {
            yield $currentNode->getItem();
            $currentNode = $currentNode->getNext();
        }
    }

    public function contains(mixed $item): bool
    {
        foreach($this->getAll() as $currentItem) {
            if ($currentItem === $item) {
                return true;
            }
        }

        return false;
    }

    public function isEmpty(): bool
    {
        return get_class($this->structureType) === 'Rehor\Datastructure\types\Stack\Stack' ? $this->structureType->isStackEmpty() : $this->structureType->isQueueEmpty();
    }
}