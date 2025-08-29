<?php
class PersegiPanjang {
    // Property
    public $panjang;
    public $lebar;

    // Constructor
    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    // Method untuk menghitung luas
    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }

    // Method untuk menghitung keliling
    public function hitungKeliling() {
        return 2 * ($this->panjang + $this->lebar);
    }
}

// Membuat objek
$persegi1 = new PersegiPanjang(10, 5);
$persegi2 = new PersegiPanjang(7, 4);

// Menampilkan hasil
echo "Persegi Panjang 1:<br>";
echo "Luas: " . $persegi1->hitungLuas() . "<br>";
echo "Keliling: " . $persegi1->hitungKeliling() . "<br><br>";

echo "Persegi Panjang 2:<br>";
echo "Luas: " . $persegi2->hitungLuas() . "<br>";
echo "Keliling: " . $persegi2->hitungKeliling();
