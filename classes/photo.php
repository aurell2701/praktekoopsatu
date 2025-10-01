<?php
namespace Classes;

class Photo {
    private $uploadDir = __DIR__ . "/../uploads/";

    public function save($base64Image) {
        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }

        $data = explode(',', $base64Image);
        $imageData = base64_decode($data[1]);

        $fileName = $this->uploadDir . "photo_" . time() . ".png";

        if (file_put_contents($fileName, $imageData)) {
            return $fileName;
        }
        return false;
    }
}