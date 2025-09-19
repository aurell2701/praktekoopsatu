<?php
//Membuat class mobil
class mobil
{
    //Buat property untuk class mobil
    public $pemilik;
    public $merk;
    //Membuat method untuk class mobil
    public function Hidupkan_mobil()
    {
        return "Hidupkan mobil $this->merk punya $this->pemilik";
    }
    public function Matikan_mobil()
    {
        return "Matikan mobil $this->merk punya $this->pemilik";
    }
    public function restart_mobil()
    {
        $matikan = $this->Matikan_mobil();
        $hidupkan = $this->Hidupkan_mobil();
        $hasil = $matikan . "<br>" . $hidupkan;
        return $hasil;
    }
}
//buat objek dari class mobil (instansiasi)
$mobil_kucing = new mobil();
//Isi property objek
$mobil_kucing->pemilik = "Meonggg";
$mobil_kucing->merk = "Jaguar";
echo $mobil_kucing->Hidupkan_mobil();
echo "\n";
echo $mobil_kucing->Matikan_mobil();
echo "\nHasil: ";
echo $mobil_kucing->restart_mobil();