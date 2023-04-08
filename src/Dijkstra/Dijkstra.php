<?php

declare(strict_types=1);

namespace Rehor\Datastructure\Dijkstra;

use Rehor\Datastructure\Dijkstra\interfaces\DijkstraInterface;
use Rehor\Datastructure\types\Graph\Graph;

final class Dijkstra implements DijkstraInterface
{
    protected const NODE_INIT_VALUE = 1e10;
    
    protected Graph $graph;
    
    protected array $edgeSum = [];
    
    protected array $usedNodes = [];
    
    protected array $path = [];
    
    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }
    
    public function __destruct()
    {        
        unset($this->graph);
        
        unset($this->edgeSum);
        
        unset($this->path);
    }
    
    public function init(): void
    {
        foreach($this->graph->getNode() as $node) {
            
            $this->edgeSum[$node] = self::NODE_INIT_VALUE;
            
            $this->usedNodes[$node] = false;
            
        }
    }
    
    public function getShortestTraversedPath(string $fromNode, string $toNode): string
    {
        $this->init();

        $this->edgeSum[$fromNode] = 0;
        
        while ($currentUnusedNode = $this->findNearestUnusedNode()) {
            
            $this->getEdgeSumForNearestUnusedNode($currentUnusedNode);
            
        }
        
        return $this->restoreTraversedPath($fromNode, $toNode);
    }
    
    public function findNearestUnusedNode(): ?string
    {
        $nearestUnusedNode = null;
        
        foreach($this->graph->getNode() as $node) {
            
            if (!$this->usedNodes[$node]) {
                
                if (is_null($nearestUnusedNode) || $this->edgeSum[$node] < $this->edgeSum[$nearestUnusedNode]) {
                    
                    $nearestUnusedNode = $node;
                    
                }
            }
        }
        
        return $nearestUnusedNode;
    }
    
    public function getEdgeSumForNearestUnusedNode(string $node): void
    {
        foreach($this->graph->getEdge($node) as $nextNode => $length) {
            
            if (!$this->usedNodes[$nextNode]) {
                
                $newLength = $this->edgeSum[$node] + $length;
                
                if ($newLength < $this->edgeSum[$nextNode]) {
                    
                    $this->edgeSum[$nextNode] = $newLength;
                    $this->path[$nextNode] = $node;
                
                }
            }
        }
        
        $this->usedNodes[$node] = true;
    }
    
    public function restoreTraversedPath(string $fromNode, string $toNode): string
    {
        $traversedPath = $toNode;
        
        if (array_key_exists($toNode, $this->path)) {
            
            while($toNode !== $fromNode) {
                
                $toNode = $this->path[$toNode];
                
                $traversedPath = $toNode.'---'.$traversedPath;
                
            }
        }
        
        return $traversedPath;
    }
}