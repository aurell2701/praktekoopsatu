<?php
// Belajar Constructor dan Destructor dengan class Bunga
class Bunga {
    private $nama;
    private $warna;

    // Constructor: otomatis dijalankan saat objek dibuat
    public function __construct($nama, $warna) {
        $this->nama = $nama;
        $this->warna = $warna;
        echo "Objek Bunga {$this->nama} dengan warna {$this->warna} telah dibuat.<br>";
    }

    // Method biasa
    public function mekar() {
        return "Bunga {$this->nama} yang berwarna {$this->warna} sedang mekar indah.<br>";
    }

    // Destructor: otomatis dijalankan saat objek dihapus
    public function __destruct() {
        echo "Objek Bunga {$this->nama} telah dihapus dari memori.<br>";
    }
}

// Membuat objek dari class Bunga
$bunga1 = new Bunga("Mawar", "Merah");
echo $bunga1->mekar();
echo "<br>";

$bunga2 = new Bunga("Melati", "Putih");
echo $bunga2->mekar();
echo "<br>";

// Hapus objek bunga2 secara manual
unset($bunga2);

echo "Selesai dieksekusi.<br>";
?>