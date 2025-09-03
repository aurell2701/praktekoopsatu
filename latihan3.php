<?php
class User {
    // Properti
    public $username;
    private $password;

    // Constructor
    public function __construct() {
        // Data login dummy
        $this->username = "admin";
        $this->password = "12345";
    }

    // Method untuk login
    public function login($inputUsername, $inputPassword) {
        if ($inputUsername == $this->username && $inputPassword == $this->password) {
            return "Login berhasil!<br>
            Selamat datang $inputUsername.";
        } else {
            return "Login gagal! Username atau password salah.";
        }
    }
} 

// Simulasi login 
$user = new User();

$inputUsername = "admin";
$inputPassword = "12345";

// Menampilkan hasil login
echo "<h3>Latihan No 3</h3>";
echo $user->login($inputUsername, $inputPassword);
?>
