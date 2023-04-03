<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../vendor/autoload.php');
require_once('utils/display.php');

use Rehor\Datastructure\types\DataStructure;
use Rehor\Datastructure\types\Queue\Queue;
use Rehor\Datastructure\types\Stack\Stack;
use Rehor\Datastructure\types\Graph\Graph;

use function Rehor\Datastructure\utils\display;

$stack = new DataStructure(new Stack());
$queue = new DataStructure(new Queue());
$graph = new Graph();

$stack->put(1)->put(2)->put('C')->put('D')->put('E');
$queue->put('First element')->put('Second element')->put(3)->put(4)->put(true);

foreach($stack->getAll() as $currentStackItem) {
    display($currentStackItem);
}

echo '<hr/>';

foreach($queue->getAll() as $currentQueueItem) {
    display($currentQueueItem);
}