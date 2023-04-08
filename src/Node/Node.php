<?php

declare(strict_types=1);

namespace Rehor\Datastructure\Node;

class Node
{
    protected $item;
    protected ?Node $next;

    public function __construct($item, ?Node $next = null)
    {
        $this->item = $item;
        $this->next = $next;
    }

    public function getItem()
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