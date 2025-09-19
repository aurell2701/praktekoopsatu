<?php
//Membuat class mobil  
class mobil
{
    //Membuat property untuk class mobil
    public $pemilik;
    public $merk;
    public $warna;
    //Membuat method untuk class mobil
    public function hidupkan_mobil()
    {
        return "Hidupkan Mobil";
    }
    public function matikan_mobil()
    {
        return "Matikan Mobil";
    }
}
//Buat objek dari class mobil (instansiasi)
$mobil_aurell = new mobil();
echo $mobil -> hidupkan_mobil();
echo"\n";

$mobil_aurell -> pemilik = "Aurellya YP";
echo"\n";