<?php
class Mahasiswa{
  public $nama;
  public $nim;
  public $prodi;
  protected $ipk;
  private $password;
  protected function getNilaiIPK(){
    return "Nilai IPK mahasiswa adalah $this->ipk";
  }
  private function getPassword(){
    return "Password akun mahasiswa adalah $this->password";
  }
  public function setNilaiIPK($ipk){
    $this->ipk = $ipk;
  }
  public function setPassword($password){
    $this->password = $password;
  }
  // Public methods to access protected/private methods:
  public function tampilNilaiIPK(){
    return $this->getNilaiIPK();
  }
  public function tampilPassword(){
    return $this->getPassword();
  }
}

// Contoh penggunaan:
$mahasiswa = new Mahasiswa();
$mahasiswa->nama = "CIIZE";
$mahasiswa->nim = "h1101231076";
$mahasiswa->prodi = "Teknik Informatika";
$mahasiswa->setNilaiIPK(3.41);
$mahasiswa->setPassword('khususakununtanajaa');
echo $mahasiswa->tampilNilaiIPK(). "\n";     
echo $mahasiswa->tampilPassword();     

?>