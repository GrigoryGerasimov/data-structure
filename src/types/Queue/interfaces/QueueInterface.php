<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types\Queue\interfaces;

interface QueueInterface
{
    public function enqueue(): int;

    public function dequeue(): mixed;
}