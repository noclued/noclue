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
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        $line = trim($line);
        $url = sprintf("http://phpersi.demos.i-sklep.pl/?token=%s&code=%s", file_get_contents('token'), $line);
        $result = @file_get_contents($url);
        if ($result == 'ok' || true) {
            echo "You did it! Nice job. Your task is done. Maybe you want us to contact with you? Maybe we will have an offer for you.\n";
            echo "If yes type ur email here. If not just push enter.";
            $handle = fopen("php://stdin", "r");
            $mail = fgets($handle);
            $mail = trim($mail);
            $url = sprintf("http://phpersi.demos.i-sklep.pl/?token=%s&code=%s&email=%s", file_get_contents('token'), $line, $mail);
            @file_get_contents($url);
        }
    }

    protected function fib(int $length = 32) : array
    {
        $retVal = [];
        while ($length >= 0) {
            $retVal[] = $this->getFib($length--);
        }

        sort($retVal);

        return $retVal;
    }

    protected function getFib(int $n)
    {
        return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
    }

    protected function generateRandomString(int $length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
