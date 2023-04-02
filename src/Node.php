<?php

declare(strict_types=1);

namespace Rehor\Datastructure\Node;

class Node
{
    protected $item;

    protected $next;

    public function __construct(mixed $item)
    {
        $this->item = $item;
    }
}