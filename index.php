<?php 
// index.php
$nama = "Kamuu ";
$waktu = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Website Aurell di Hugging Face</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Playfair Display', serif; 
            text-align: center; 
            margin-top: 50px; 
            background: linear-gradient(to bottom, #e6f7ff, #ffffff); 
            color: #2c3e50;
            font-size: 16px;
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
        }
       .box {
            background-color: #FFFFF0; /* Putih gading */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 70%; /* biar memanjang ke samping */
            margin: 20px auto;
            text-align: center;
        }
        .tugas-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1E3A8A; /* biru navy elegan */
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            margin: 5px; /* biar ada jarak antar tombol */
        }
        .tugas-btn:hover {
            background-color: #2563EB; /* biru lebih terang pas hover */
        }
        h1 {
            font-size: 1.8em; 
            font-weight: 700;
            white-space: nowrap; 
            color: #2C3E50; 
        }
        p {
            color: #000000; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website Aurell</h1>
        <p>Halo <strong><?= htmlspecialchars($nama) ?></strong></p>
        
        <div class="box">
            <p>Semoga Bisa <strong> Menambah Pengetahuan Baru </strong> Disini ! </p>
            <a href="latihan1.php" class="tugas-btn">Tugas 1</a>
            <a href="latihan2.php" class="tugas-btn">Tugas 2</a>
            <a href="latihan3.php" class="tugas-btn">Tugas 3</a>
            <a href="tugasmandiri.php" class="tugas-btn">Tugas Mandiri</a>
            <a href="praktek5.php" class="tugas-btn">Belajar Bersama Asdos</a>
            <a href="praktikum5.1.php" class="tugas-btn">Praktikum 5.1</a>
            <a href="praktikum5.2.php" class="tugas-btn">Praktikum 5.2</a>
            <a href="praktikum6.php" class="tugas-btn">Praktikum 6</a>

        </div>
    </div>
</body>
</html>
