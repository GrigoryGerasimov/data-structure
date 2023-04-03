<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Graph\interfaces;

interface GraphInterface
{
    public function addNodes(string $node): self;

    public function addEdges(string $node1, string $node2, string $length): self;

    public function getNodes(): ?iterable;

    public function getEdges(string $node1): ?iterable;
}