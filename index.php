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
            color: #87CEEB;
            font-size: 16px;
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
        }
        .box { 
            background: #f0f8ff; 
            padding: 20px; 
            border-radius: 15px; 
            margin-top: 20px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
        }
        .tugas-btn {
            display: inline-block; 
            padding: 12px 24px; 
            background-color: #4da6ff; 
            color: white; 
            text-decoration: none; 
            border-radius: 10px; 
            font-weight: bold;
            transition: 0.3s;
            margin: 8px; 
            box-shadow: 0 3px 6px rgba(0,0,0,0.15);
        }
        .tugas-btn:hover {
            background-color: #3399ff; 
            transform: scale(1.05); 
        }
        h1 {
            font-size: 1.8em; 
            font-weight: 700;
            white-space: nowrap; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website Aurell</h1>
        <p>Halo <strong><?= htmlspecialchars($nama) ?></strong></p>
        <div class="box">
            <p>Semoga Bisa <strong> Belajar dan Menambah Pengetahuan Baru </strong> Disini ! </p>
            <a href="latihan1.php" class="tugas-btn">Tugas 1</a>
            <a href="latihan2.php" class="tugas-btn">Tugas 2</a>
            <a href="latihan3.php" class="tugas-btn">Tugas 3</a>
        </div>
    </div>
</body>
</html>
