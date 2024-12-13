<?php 

// cek apakah tidak ada data di $_GET
if (!isset($_GET["nama"]) || !isset($_GET["NISN"]) || !isset($_GET["email"]) || !isset($_GET["jurusan"]) || !isset($_GET["gambar"]) ) { //jika "($_GET["nama"])" belum dibikin
    // redirect(pindahkan user ke halaman lain dengan paksa)
    header("Location: latihan1.php");
    exit;
}
// "http://localhost/phpdasar/pertemuan7/latihan2.php?nama=Abdul%20Hafid&NISN=008763423&email=redmatrix@gmail.com&jurusan=RPL&gambar=p1.jpg"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>

</head>
<body>

<ul>
    <li><img src="saga/<?= $_GET["gambar"] ?>" alt=""></li>
    <li><?= $_GET["nama"];?></li>
    <li><?= $_GET["NISN"];?></li>
    <li><?= $_GET["email"];?></li>
    <li><?= $_GET["jurusan"];?></li>
</ul>

<a href="latihan1.php">kembali KeDaftar Mahasiswa</a>
    
</body>
</html>