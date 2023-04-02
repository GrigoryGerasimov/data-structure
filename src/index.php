<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once ('../vendor/autoload.php');

use Rehor\Datastructure\types\DataStructure;
use Rehor\Datastructure\types\Queue\Queue;
use Rehor\Datastructure\types\Stack\Stack;

$stru = new DataStructure(new Stack());

$stru->put('A')->put('B')->put('C')->put('D')->put('E');

print_r($stru->get().PHP_EOL);
print_r($stru->get().PHP_EOL);
print_r($stru->get().PHP_EOL);
print_r($stru->get().PHP_EOL);
print_r($stru->get().PHP_EOL);