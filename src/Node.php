<?php

declare(strict_types=1);

namespace Rehor\Datastructure;

class Node
{
    protected mixed $item;
    protected ?Node $next;

    public function __construct(mixed $item, ?Node $next = null)
    {
        $this->item = $item;
        $this->next = $next;
    }

    public function getItem(): mixed
    {
        return $this->item;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext(Node $node)
    {
        $this->next = $node;
    }
}