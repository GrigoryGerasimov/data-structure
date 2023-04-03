<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Graph\interfaces;

interface GraphInterface
{
    public function addNode(string $node): self;

    public function addEdge(string $node1, string $node2, int $length): self;

    public function getNode(): ?iterable;

    public function getEdge(string $node1): ?iterable;
}