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
    <!-- Import font mewah -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Playfair Display', serif; 
            text-align: center; 
            margin-top: 50px; 
            background: linear-gradient(to bottom, #e6f7ff, #ffffff); /* gradasi biru */
            color: #2c3e50; /* teks abu gelap elegan */
        }
        .container { max-width: 600px; margin: 0 auto; }
        .box { 
            background: #f0f8ff; 
            padding: 20px; 
            border-radius: 15px; 
            margin-top: 20px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* efek mewah */
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
            transform: scale(1.05); /* efek mewah saat hover */
        }
        h1 {
            font-size: 2.5em;
            font-weight: 700;
        }
    </style>
</head>
