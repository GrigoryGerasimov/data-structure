<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Queue\interfaces;

interface QueueInterface
{
    public function enqueue(mixed $item): void;

    public function dequeue(): mixed;

    public function isQueueEmpty();
}