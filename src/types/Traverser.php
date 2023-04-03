<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types;

use Rehor\Datastructure\types\Graph\Graph;
use Rehor\Datastructure\DataStructure\DataStructure;

class Traverser
{
    public array $pathRecur;
    protected array $pathIter;
    private Graph $graph;

    public function __construct(Graph $graph)
    {
        $this->pathRecur = [];
        $this->pathIter = [];
        $this->graph = $graph;
    }

    public function traverseRecursive(string $node): void
    {
        $this->pathRecur[$node] = true;

        if ($this->graph->getNode()) {
            foreach($this->graph->getNode() as $edgeNode) {
                if (!key_exists($edgeNode, $this->pathRecur)) {
                    $this->traverseRecursive($edgeNode);
                }
            }
        }
    }

    public function traverseIterative(string $node, DataStructure $stru): array
    {
        $this->pathIter[$node] = true;
        $stru->put($node);

        while (!$stru->isEmpty()) {

            $currentNode = $stru->getOne();
            $this->pathIter[$currentNode] = true;

            foreach($this->graph->getEdge($currentNode) as $nextNode) {

            if (!key_exists($nextNode, $this->pathIter)) {
                if(!$stru->contains($nextNode)) {
                    $stru->put($nextNode);
                }
            }
        }
        }
        

        return $this->pathIter;
    }
}