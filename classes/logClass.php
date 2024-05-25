<?php

date_default_timezone_set('Europe/Istanbul');

class Log
{
    public function add($text)
    {
        $data = date("d.m.Y") . " " . date("H:i:s") . "   " . $text . PHP_EOL;

        $upOne = realpath(__DIR__ . '/..');
        $folder =  $upOne . "/log/";
        $logFileName = $folder . date("d-m-Y") . ".log";

        if (!file_exists($folder)) {
            mkdir($folder);
        }

        if (!file_exists($logFileName)) {
            file_put_contents($logFileName, "\xEF\xBB\xBF");
        }

        $ofile = fopen($logFileName, "a");

        fwrite($ofile, $data);
        fclose($ofile);
    }
}