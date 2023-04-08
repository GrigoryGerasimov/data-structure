<?php

declare(strict_types=1);

namespace Rehor\Datastructure\Dijkstra\interfaces;

interface DijkstraInterface
{
    public function init(): void;
    
    public function getShortestTraversedPath(string $fromNode, string $toNode): string;
    
    public function findNearestUnusedNode(): ?string;
    
    public function getEdgeSumForNearestUnusedNode(string $node): void;
    
    public function restoreTraversedPath(string $fromNode, string $toNode): string;
}