<?php

namespace Legion\Question;

use function sleep;

abstract class AbstractGame
{
    public function __construct()
    {
        $this->write();
    }

    abstract protected function doWrite() : void;

    protected function write() : void
    {
        $this->doWrite();
        sleep(1);
        $this->clear();
    }

    abstract public function play() : void;

    protected function clear() : void
    {
        system('clear');
    }

    protected function sayDone() : void
    {
        echo "Task done! \n";
        sleep(1);
    }
}
