<?php

namespace Legion\Question;

class Second extends AbstractGame
{

    protected function doWrite(): void
    {
        echo "\e[1;34m
            _     _                                               _     _ 
__   _____ (_) __| |  _ __ ___   ___  __ _ _ __  ___  __   _____ (_) __| |
\ \ / / _ \| |/ _` | | '_ ` _ \ / _ \/ _` | '_ \/ __| \ \ / / _ \| |/ _` |
 \ V / (_) | | (_| | | | | | | |  __/ (_| | | | \__ \  \ V / (_) | | (_| |
  \_/ \___/|_|\__,_| |_| |_| |_|\___|\__,_|_| |_|___/   \_/ \___/|_|\__,_|
                                                                          
        \e[0m";
    }
}
