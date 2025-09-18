<?php
class Mahasiswa {
    public $nama;
    public $nim;
    public $prodi;
    public $angkatan;
    public $keterangan;

    public function getKeterangan() {
        return "Status Mahasiswa: " . $this->keterangan;
    }
}

// buat objek
$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Adhelia Isabel";
$mahasiswa1->nim = "H11012141001";
$mahasiswa1->prodi = "Sistem Informasi";
$mahasiswa1->angkatan = "2021";
$mahasiswa1->keterangan = "Aktif";

$mahasiswa2 = new Mahasiswa();
$mahasiswa2->nama = "Gyraldine Agustiwi";
$mahasiswa2->nim = "H1101241017";
$mahasiswa2->prodi = "Teknik Informatika";
$mahasiswa2->angkatan = "2020";
$mahasiswa2->keterangan = "Cuti";

$mahasiswa3 = new Mahasiswa();
$mahasiswa3->nama = "Luiz Fernando";
$mahasiswa3->nim = "H1101241041";
$mahasiswa3->prodi = "Matematika";
$mahasiswa3->angkatan = "2019";
$mahasiswa3->keterangan = "Keluar";

// tampilkan list tanpa <br>, langsung newline
echo "- Mahasiswa 1: $mahasiswa1->nama ($mahasiswa1->nim) - " . $mahasiswa1->getKeterangan() . "\n";
echo "- Mahasiswa 2: $mahasiswa2->nama ($mahasiswa2->nim) - " . $mahasiswa2->getKeterangan() . "\n";
echo "- Mahasiswa 3: $mahasiswa3->nama ($mahasiswa3->nim) - " . $mahasiswa3->getKeterangan() . "\n";

?>
