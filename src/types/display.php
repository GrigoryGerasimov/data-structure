<?php

declare(strict_types=1);

namespace Rehor\Datastructure\types;

function display(mixed $view): void
{
    echo '<pre>';
    print_r($view);
    echo '</pre>';
}