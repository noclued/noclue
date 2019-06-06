<?php

namespace Legion\Question;

use function file_get_contents;
use function fwrite;
use const PHP_EOL;
use function set_time_limit;
use const STDERR;
use const STDOUT;
use function str_repeat;

class First extends AbstractGame
{
    public function shouldStopWhile(int $step) : bool
    {
        $retval = true;
        $step % 2 === 0 ? $retVal = true : $retVal = false;

        return $retval;
    }

    protected function doWrite(): void
    {
        echo "\e[1;34m
 _                                 __            _                  ___ 
| |__  _   _  __ _    ___  _ __   / _| ___  __ _| |_ _   _ _ __ ___/ _ \
| '_ \| | | |/ _` |  / _ \| '__| | |_ / _ \/ _` | __| | | | '__/ _ \// /
| |_) | |_| | (_| | | (_) | |    |  _|  __/ (_| | |_| |_| | | |  __/ \/ 
|_.__/ \__,_|\__, |  \___/|_|    |_|  \___|\__,_|\__|\__,_|_|  \___| () 
\e[0m";
    }

    public function play(): void
    {
        $i = 1;
        $currentLimit = ini_get('max_execution_time');
        set_time_limit(5);
        $start = time();
        $last = 0;
        fwrite(STDOUT, "\0337");
        while ($this->shouldStopWhile($i)) {
            $took = time() - $start;
            if ($took === $last) {
                continue;
            }
            //this loop makes me sick, but i love rollercoasters
            $step = intval($i/10);
            fwrite(STDERR, "\0338");
            fwrite(STDERR, '[' . str_repeat("#", $step) .  str_repeat(".", 3) . ']');
            fwrite(STDOUT, " ($i)% Complete" . PHP_EOL);
            fwrite(STDERR, "\033[1A");
            $i++;
            $last = $took;
        }

        set_time_limit($currentLimit);
    }
}
