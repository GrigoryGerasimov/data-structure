<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Graph;

use Rehor\Datastructure\types\Graph\interfaces\GraphInterface;

class Graph implements GraphInterface
{
    private array $edges;

    public function __construct()
    {
        $this->edges = [];
    }

    public function addNodes(string $node): self
    {
        $this->edges[$node] = [];

        return $this;
    }

    public function addEdges(string $node1, string $node2, string $length): self
    {
        $this->edges[$node1][$node2] = $length;
        $this->edges[$node2][$node1] = $length;

        return $this;
    }

    public function getNodes(): ?iterable
    {
        if (is_null($this->edges) || !count($this->edges)) {
            return null;
        }

        foreach($this->edges as $node => $nodeArr) {
            yield $node;
        }
    }

    public function getEdges(string $node1): ?iterable
    {
        if (!isset($this->edges[$node1]) || !count($this->edges[$node1])) {
            return null;
        }

        foreach($this->edges[$node1] as $node2 => $length) {
            yield $node1.'=>'.$node2.'='.$length;
        }
    }
}