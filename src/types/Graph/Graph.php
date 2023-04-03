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
        if ($this->isEmpty($this->edges)) {
            return null;
        }

        foreach($this->edges as $node => $edge) {
            yield $node;
        }
    }

    public function getEdge(string $node1): ?iterable
    {
        if ($this->isEmpty($this->edges[$node1])) {
            return null;
        }

        foreach($this->edges[$node1] as $node2 => $length) {
            yield $node2;
        }  
    }

    public function getDistance(string $node1): ?iterable
    {
        if ($this->isEmpty($this->edges[$node1])) {
            return null;
        }

        foreach($this->edges[$node1] as $node2 => $length) {
            yield 'Distance between '.$node1.' and '.$node2.' makes '.$length;
        }
    }

    public function isEmpty(mixed $elem): bool
    {
        return !isset($elem) || !count($elem);
    }
}