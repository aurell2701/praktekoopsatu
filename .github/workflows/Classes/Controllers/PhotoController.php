<?php
namespace Controllers;

require_once __DIR__ . "/../Photo.php";
require_once __DIR__ . "/../Logger.php";

use Classes\Photo;
use Classes\Logger;

class PhotoController {
    public function save($photoData) {
        $photo = new Photo();
        $filename = $photo->save($photoData);

        $logger = new Logger();
        $logger->log("Foto disimpan: " . $filename);

        return $filename;
    }
}