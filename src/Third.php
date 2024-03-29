<?php

namespace Legion\Question;

use function file_get_contents;

class Third extends AbstractGame
{
    protected function write() : void
    {
        $this->doWrite();
        sleep(1);
    }

    protected function doWrite(): void
    {
        echo "\e[1;34m
   ___ _ _                                _ 
  / __(_) |__   ___  _ __   __ _  ___ ___(_)
 / _\ | | '_ \ / _ \| '_ \ / _` |/ __/ __| |
/ /   | | |_) | (_) | | | | (_| | (_| (__| |
\/    |_|_.__/ \___/|_| |_|\__,_|\___\___|_|
                                    
Use your token Luke!        
        \e[0m";
    }

    public function play(): void
    {
        echo "Do you know your code? Type it here: ";
        $line = readline("Do you know your code? Type it here: ");
        $line = trim($line);
        $url = sprintf("http://phpersi.demos.i-sklep.pl/?token=%s&code=%s", file_get_contents('/var/token'), $line);
        $result = @file_get_contents($url);
        if ($result == 'ok') {
            echo "You did it! Nice job. Your task is done. Maybe you want us to contact with you? Maybe we will have an offer for you.\n";
            $mail = readline("If yes type ur email here. If not just push enter. ");
            $mail = trim($mail);
            $url = sprintf("http://phpersi.demos.i-sklep.pl/?token=%s&code=%s&email=%s", file_get_contents('/var/token'), $line, $mail);
            @file_get_contents($url);
        }
    }

}
