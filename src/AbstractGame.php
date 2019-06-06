<?php

namespace Legion\Question;

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
}
