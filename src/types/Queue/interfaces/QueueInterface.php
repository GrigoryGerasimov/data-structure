<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Queue\interfaces;

interface QueueInterface
{
    public function enqueue($item): void;

    public function dequeue();

    public function isQueueEmpty();
}