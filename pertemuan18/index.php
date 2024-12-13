<?php 
 
 session_start();
// cek apakah user sudah login apa belum, memakai session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// menghubungkan ke halaman function.php
require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerhalaman = 5;
    // $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    // $jumlahData = mysqli_num_rows($result); //akan menghasilkan, ada berapa / jumlah baris yang dikembalikan dari "SELECT * FROM mahasiswa"
    // var_dump($jumlahData);
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
// var_dump($jumlahHalaman);

// versi yang memakai tenary
$halamanAktif = (isset($_GET["halaman"]) && is_numeric($_GET["halaman"])) ? (int)$_GET["halaman"] : 1;
var_dump($halamanAktif);

// versi yang memakai if else
// if (isset($_GET["halaman"])) {
//     $halamanAktif = $_GET["halaman"]; // untuk menentukan sekarang kita sedang di halaman berapa
// }else {
//     $halamanAktif = 1;
// }
// var_dump($halamanAktif);

$dataAwal = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC LIMIT $dataAwal, $jumlahDataPerhalaman");
// $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC LIMIT 5,3 "); //tampilkan 3 data dimulai dari index ke 5
// $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC"); dari bawah ke atas

// tombol cari di tekan
if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>

    <a href="logout.php">Logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Daftar Siswa</a>
    <br>
    <br>

    <form action="" method="post">

        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>

    </form>

    <br><br>

    <!-- navigasi -->

    <?php if($halamanAktif > 1):?>
      <a href="?halaman=<?= $halamanAktif - 1 ;?>">&laquo;</a>
    <?php endif;?>

     <?php for ($i=1; $i < $jumlahHalaman; $i++):?>
        <?php if($i == $halamanAktif):?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
        <?php else:?>
            <a href="?halaman=<?= $i; ?>" ><?= $i; ?></a>
        <?php endif;?>
    <?php endfor;?>
    
    <?php if($halamanAktif < $jumlahHalaman):?>
      <a href="?halaman=<?= $halamanAktif + 1 ;?>">&raquo;</a>
    <?php endif;?>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No. </th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nisn</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>


    <?php $no = 1;?>
    <?php foreach($mahasiswa as $mhs):?>
    <tr>
        <td><?= $no?></td>
        <td>
            <a href="ubah.php?id=<?= $mhs["id"]?>">Ubah</a> | 
            <a href="hapus.php?id=<?= $mhs["id"]?>" onclick="return confirm('Yakin dek');">Hapus</a>
        </td>
        <td><img src="saga/<?= $mhs["gambar"]?>" width="50" alt=""></td>
        <td><?= $mhs["npsn"]?></td>
        <td><?= $mhs["nama"]?></td>
        <td><?= $mhs["email"]?></td>
        <td><?= $mhs["jurusan"]?></td>
    </tr>
    <?php $no++;?>
    <?php endforeach?>

    </table>

    <?php $n = 1;?>
        <?php for ($i=0; $i < 5; $i++) :?>
            <h1> <?= $n?> haha</h1>
            <?php $n++;?>
        <?php endfor?>
    
    
</body>
</html>