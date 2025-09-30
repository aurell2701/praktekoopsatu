<?php
require_once "classes/Controllers/PhotoController.php";

use Controllers\PhotoController;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['photo'])) {
    $controller = new PhotoController();
    $filename = $controller->save($_POST['photo']);

    if ($filename) {
        echo "<p>Foto berhasil disimpan: $filename</p>";
        echo "<a href='gallery.php'>Lihat Galeri Penyimpanan</a>";
    } else {
        echo "<p>Gagal menyimpan foto.</p>";
    }
} else {
    echo "<p>Tidak ada data foto yang disimpan !.</p>";
}
?>