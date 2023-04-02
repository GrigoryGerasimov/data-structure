<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Stack;

use Rehor\Datastructure\types\Stack\interfaces\StackInterface;
use Rehor\Datastructure\Node;

final class Stack implements StackInterface
{
    private ?Node $last;

    public function __construct()
    {
        $this->last = null;
    }

    public function push(mixed $item): void
    {
        $this->last = new Node($item, $this->last);
    }

    public function pop(): mixed
    {
        if ($this->isStackEmpty()) {
            return null;
        }

        $item = $this->last->getItem();
        $this->last = $this->last->getNext();
        return $item;
    }

    public function isStackEmpty(): bool
    {
        return is_null($this->last);
    }
}