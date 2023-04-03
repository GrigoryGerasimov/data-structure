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

    public function addNode(string $node): self
    {
        $this->edges[$node] = [];

        return $this;
    }

    public function addEdge(string $node1, string $node2, int $length): self
    {
        $this->edges[$node1][$node2] = $length;
        $this->edges[$node2][$node1] = $length;

        return $this;
    }

    public function getNode(): ?iterable
    {
        if (is_null($this->edges) || !count($this->edges)) {
            return null;
        }

        foreach($this->edges as $node => $edge) {
            yield $node;
        }
    }

    public function getEdge(string $node1): ?iterable
    {
        if (!isset($this->edges[$node1]) || !count($this->edges[$node1])) {
            return null;
        }

        foreach($this->edges[$node1] as $node2 => $length) {
            yield 'Distance between '.$node1.' and '.$node2.' makes '.$length;
        }
    }
}