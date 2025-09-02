<?php
class Produk {
    // properti
    public $nama;
    public $harga;
    public $stok;

    // Constructor
    public function __construct($nama, $harga, $stok) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    } 

    // method tampilkaninfo
    public function tampilkanInfo() {
        return "Nama Produk: $this->nama<br>
        Harga Produk: $this->harga<br>
        Stok Produk: $this->stok";
    }

    // method beliproduk
    public function beliProduk($jumlah) {
        if ($jumlah > $this->stok) {
            return "Stok tidak mencukupi. Stok tersedia: $this->stok.";
        }
        $this->stok -= $jumlah;
        $totalHarga = $jumlah * $this->harga;
        return "Pembelian berhasil<br>
        Jumlah: $jumlah.<br>
        Sisa stok: $this->stok.";
    }
}

// Buat objek produk
$produk = new Produk("Buku", 30000, 10);

// Menampilkan hasil
echo "<h3>Latihan No 2</h3>";
echo $produk->tampilkanInfo();
echo "<br><br>";
echo $produk->beliProduk(3);
echo "<br><br>";
echo "Sisa Produk<br>";
echo $produk->tampilkanInfo();
?>
