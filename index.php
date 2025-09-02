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
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .container { max-width: 600px; margin: 0 auto; }
        .box { background: #f0f8ff; padding: 20px; border-radius: 10px; margin-top: 20px; }

        /* tombol tugas */
        .tugas-btn {
            display: inline-block; 
            padding: 10px 20px; 
            background-color: #4CAF50;
            color: black; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: bold;
            transition: 0.3s;
            margin: 5px; 
        }
        .tugas-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website Aurell!</h1>
        <p>Halo <strong><?= htmlspecialchars($nama) ?></strong></p>
        <div class="box">
            <p>Semoga Bisa <strong> Belajar dan Menambah Pengetahuan Baru </strong> Disini </p>
            
            <!-- Tambahkan class tugas-btn -->
            <a href="latihan1.php" class="tugas-btn">Tugas 1</a>
            <a href="latihan2.php" class="tugas-btn">Tugas 2</a>
        </div>
    </div>
</body>
</html>
