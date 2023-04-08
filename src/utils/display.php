<?php

declare(strict_types=1);

namespace Rehor\Datastructure\utils;

function display($view): void
{
    echo '<pre>';
    print_r($view);
    echo '</pre>';
}