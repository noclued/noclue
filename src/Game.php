<?php

namespace Legion\Question;

class Game extends AbstractGame
{

    public function __construct()
    {
        register_shutdown_function('__shutdown');
        $this->clear();
        parent::__construct();
    }

    public function play() : void
    {
        $this->doWrite();
        echo "Hello! So first stage has been made? Well done!\n";
        echo "Let`s start next!\n";
        sleep(5);
        $this->clear();
        $game = new First();
        $game->play();
        $game = new Second();
        $game->play();
        $game = new Third();
        $game->play();
    }

    protected function doWrite(): void
    {
        echo "\e[1;34m
 _                     _                     
(_)      ___ _   _ ___| |_ ___ _ __ ___  ___ 
| |_____/ __| | | / __| __/ _ \ \'_ ` _ \/ __|
| |_____\__ \ |_| \__ \ ||  __/ | | | | \__ \
|_|     |___/\__, |___/\__\___|_| |_| |_|___/
             |___/                           
\e[0m";
    }
}
