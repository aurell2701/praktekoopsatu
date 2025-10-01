<?php
namespace Classes;

class Logger {
    private $logFile = "uploads/log.txt";

    public function log($message) {
        $time = date("Y-m-d H:i:s");
        file_put_contents($this->logFile, "[$time] $message\n", FILE_APPEND);
    }
}