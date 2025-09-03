<?php
class Buku {
    public $judul;
    public $penulis;
    public $tahun;

    // Constructor
    public function __construct($judul, $penulis, $tahun) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahun = $tahun;
    }
}
class Perpustakaan {
    private array $daftarBuku = []; // ← Properti DIJELASKAN dengan tipe array

    public function tambahBuku(Buku $buku) {
        $this->daftarBuku[] = $buku;
    }

    public function tampilkanBuku() {
        if (empty($this->daftarBuku)) {
            echo "Belum ada buku di perpustakaan.<br>";
        } else {
            echo "<h3>Daftar Buku di Perpustakaan:</h3>";
            echo "<ul>";
            foreach ($this->daftarBuku as $buku) {
                echo "<li><strong>{$buku->judul}</strong> - {$buku->penulis} ({$buku->tahun})</li>";
            }
            echo "</ul>";
        }
    }
}

$perpustakaan = new Perpustakaan();

$buku1 = new Buku("Strategic Management", "Fred R. David & Forest R. David", 2020);
$buku2 = new Buku("Manajemen Keuangan", "Kasmir", 2019);
$buku3 = new Buku("Organizational Behavior", "Stephen P. Robbins & Timothy A. Judge", 2017);
$buku4 = new Buku("Blue Ocean Strategy", "W. Chan Kim & Renée Mauborgne", 2015);
$buku5 = new Buku("The Lean Startup", "Eric Ries", 2011);

$perpustakaan->tambahBuku($buku1);
$perpustakaan->tambahBuku($buku2);
$perpustakaan->tambahBuku($buku3);
$perpustakaan->tambahBuku($buku4);
$perpustakaan->tambahBuku($buku5);

$perpustakaan->tampilkanBuku();
?>
