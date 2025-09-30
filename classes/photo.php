<?php
namespace Classes;

use Traits\Timestampable;
use Interfaces\Savable;

class Photo implements Savable {
    use Timestampable;

    private string $filename;
    private string $data;
    const UPLOAD_DIR = "uploads/";

    public function __construct(string $data) {
        $this->data = $data;
    }

    public function save(): string {
        $this->filename = self::UPLOAD_DIR . "photo_" . time() . ".png";
        $img = str_replace('data:image/png;base64,', '', $this->data);
        $img = str_replace(' ', '+', $img);
        file_put_contents($this->filename, base64_decode($img));
        return $this->filename;
    }

    public function __toString(): string {
        return "Foto disimpan di: " . $this->filename;
    }

    public function __clone() {
        $this->filename = self::UPLOAD_DIR . "clone_" . time() . ".png";
    }
}