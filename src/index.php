<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../vendor/autoload.php');
require_once('utils/display.php');

use Rehor\Datastructure\DataStructure\DataStructure;
use Rehor\Datastructure\types\Queue\Queue;
use Rehor\Datastructure\types\Stack\Stack;
use Rehor\Datastructure\types\Graph\Graph;
use Rehor\Datastructure\types\Traverser;
use Rehor\Datastructure\Dijkstra\Dijkstra;

use function Rehor\Datastructure\utils\display;

$stack = new DataStructure(new Stack());
$queue = new DataStructure(new Queue());
$graph = new Graph();

$stack->put(1)->put(2)->put('C')->put('D')->put('E');
$queue->put('First element')->put('Second element')->put(3)->put(4)->put(true);
$graph->addNode('A')->addNode('B')->addNode('C')->addNode('D')->addNode('E')->addNode('F')->addNode('G');
$graph->addEdge('A', 'B', 2)->addEdge('A', 'C', 3)->addEdge('A', 'D', 6)
    ->addEdge('B', 'C', 4)->addEdge('B', 'E', 9)
    ->addEdge('C', 'D', 1)->addEdge('C', 'E', 7)->addEdge('C', 'F', 6)
    ->addEdge('D', 'F', 4)
    ->addEdge('E', 'F', 1)->addEdge('E', 'G', 5)
    ->addEdge('F', 'G', 8);

foreach($stack->getAll() as $currentStackItem) {
    
    display($currentStackItem);
    
}

echo '<hr/>';

foreach($queue->getAll() as $currentQueueItem) {
    
    display($currentQueueItem);
    
}

echo '<hr/>';

foreach($graph->getNode() as $node) {
    
    foreach($graph->getDistance($node) as $nodeEdge) {
        
        display($nodeEdge);
        
    }
}

$traverser = new Traverser($graph);
$traverser->traverseRecursive('C');
display($traverser->pathRecur);

$traversedPath = $traverser->traverseIterative('C', new DataStructure(new Stack()));
display($traversedPath);

$dijkstra = new Dijkstra($graph);
display($dijkstra->getShortestTraversedPath('A', 'G'));