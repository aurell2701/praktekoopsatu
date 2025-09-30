<?php
namespace Classes;

final class Logger {
    public static function log(string $message): void {
        $time = date("H:i:s");
        file_put_contents("log.txt", "[$time] $message\n", FILE_APPEND);
    }
}