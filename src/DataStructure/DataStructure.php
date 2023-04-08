<?php

declare(strict_types=1);

namespace Rehor\Datastructure\DataStructure;

use Rehor\Datastructure\types\StructureType;

class DataStructure extends Structure
{
    private StructureType $structureType;

    public function __construct(StructureType $structureType)
    {
        $this->structureType = $structureType;
    }

    public function put($item): self
    {
        if (!is_null($this->structureType)) {
            
            get_class($this->structureType) === 'Rehor\Datastructure\types\Stack\Stack' ? $this->structureType->push($item) : $this->structureType->enqueue($item);
        
        }
        
        return $this;
    }

    public function getOne()
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

    public function contains($item): bool
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