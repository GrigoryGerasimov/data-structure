<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../vendor/autoload.php');
require_once('types/display.php');

use Rehor\Datastructure\types\DataStructure;
use Rehor\Datastructure\types\Queue\Queue;
use Rehor\Datastructure\types\Stack\Stack;

use function Rehor\Datastructure\types\display;

$stack = new DataStructure(new Stack());
$queue = new DataStructure(new Queue());

$stack->put(1)->put(2)->put('C')->put('D')->put('E');
$queue->put('First element')->put('Second element')->put(3)->put(4)->put(true);

for ($i = 0; $i < 5; $i++) {
    display($stack->get());
} 
echo '<hr/>';
for ($i = 0; $i < 5; $i++) {
    display($queue->get());
} 