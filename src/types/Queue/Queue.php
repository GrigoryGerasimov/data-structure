<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Queue;

use Rehor\Datastructure\types\Queue\interfaces\QueueInterface;
use Rehor\Datastructure\types\StructureType;
use Rehor\Datastructure\Node;

final class Queue extends StructureType implements QueueInterface
{
    private ?Node $last;
    private ?Node $head;

    public function __construct()
    {
        $this->last = null;
        $this->head = null;
    }
    
    public function enqueue(mixed $item): void
    {
        $node = new Node($item);

        if ($this->isQueueEmpty()) {
            $this->head = $node;
            $this->last = $this->head;
        } else {
            $this->last->setNext($node);
            $this->last = $node;
        }
    }

    public function dequeue(): mixed
    {
        if ($this->isQueueEmpty()) {
            return null;
        }

        $item = $this->head->getItem();
        $this->head = $this->head->getNext();
        return $item;
    }

    public function isQueueEmpty(): bool
    {
        return is_null($this->head);
    }

    public function getFirst(): ?Node
    {
        return !$this->isQueueEmpty() ? $this->head : null;
    } 
}