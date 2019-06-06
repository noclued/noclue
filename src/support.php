<?php

function __shutdown()
{
    $lastError = error_get_last();
    if ($lastError !== null) {
        echo "Never give up, there must be something more...\n";
    }
}

function __microtime()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}