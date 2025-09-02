<?php
class PersegiPanjang {
    // properti
    public $panjang;
    public $lebar;

    // method untuk menghitung luas
    public function luas() {
        $hasil = $this->panjang * $this->lebar;
        return "Panjang: $this->panjang<br>
        Lebar: $this->lebar<br>
        Luas: $hasil";
    }

    // method untuk menghitung keliling
    public function keliling() {
        $hasil = 2 * ($this->panjang + $this->lebar);
        return "Panjang: $this->panjang<br>
        Lebar: $this->lebar<br>
        Keliling: $hasil";
    }
}

$hsl = new PersegiPanjang();
$hsl->panjang = 15;
$hsl->lebar = 10;

// Menampilkan hasil
echo "<h3>Latihan No 1</h3>";
echo $hsl->luas();
echo "<br>";
echo "<br>";
echo $hsl->keliling();
