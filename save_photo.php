<?php
require_once "classes/Photo.php";
require_once "classes/Logger.php";
require_once "classes/Controllers/PhotoController.php";
require_once "classes/Traits/Timestampable.php";
require_once "classes/Interfaces/Savable.php";

use Controllers\PhotoController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new PhotoController();
    $filename = $controller->save($_POST['photo']);
    echo "<p>Foto berhasil disimpan: $filename</p>";
    echo "<a href='gallery.php'>Lihat Galeri</a>";
}