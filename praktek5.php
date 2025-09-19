<?php
// Buat class mobil
class mobil
{
  // buat property untuk class laptop
  var $pemilik;
  var $merk;
  var $warna;
  //Buat method untuk class mobil
  function hidupkan_mobil()
  {
    return "Hidupkan Mobil anda";
  }
  function matikan_mobil()
  {
    return "Matikan Mobil anda";
  }
}
// buat objek dari class laptop (instansiasi)
$mobil_aurell = new mobil();
$mobil_cynthia = new mobil();
$mobil_luiz = new mobil();
// set property
$mobil_aurell->pemilik = "Aurellya YP";
$mobil_cynthia->pemilik = "Cynthia";
$mobil_luiz->pemilik = "Luiz";
// tampilkan property
echo $mobil_aurell->pemilik; //Aurell
echo "\n";
echo $mobil_cynthia->pemilik; // Cynthia
echo "\n";
echo $mobil_luiz->pemilik; // Luiz
echo "\n";