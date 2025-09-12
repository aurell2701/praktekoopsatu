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
$mobil_syahrul = new mobil();
$mobil_rahma = new mobil();
$mobil_yuda = new mobil();
// set property
$mobil_syahrul->pemilik = "Aurellya YP";
$mobil_rahma->pemilik = "Cynthia";
$mobil_yuda->pemilik = "Luiz";
// tampilkan property
echo $mobil_syahrul->pemilik; //syahrul
echo "\n";
echo $mobil_rahma->pemilik; //rahma
echo "\n";
echo $mobil_yuda->pemilik; //yuda
echo "\n";
