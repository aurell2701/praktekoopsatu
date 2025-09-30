<?php
namespace Controllers;

use Classes\Photo;
use Classes\Logger;

class PhotoController {
    public function save(string $data): string {
        try {
            $photo = new Photo($data);
            $filename = $photo->save();
            Logger::log("Foto berhasil disimpan: $filename");
            return $filename;
        } catch (\Exception $e) {
            Logger::log("Error: " . $e->getMessage());
            throw $e;
        }
    }
}