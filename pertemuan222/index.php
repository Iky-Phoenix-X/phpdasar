<?php 
 
 session_start();
// cek apakah user sudah login apa belum, memakai session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// menghubungkan ke halaman function.php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");
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
    
    <style>
        .loader{
            position: absolute;
            width: 100px;
            height: 100px;
            top: 105px;
            left: 290px;
            z-index: -1;
            display: none;
        }

        @media print{
            .logout,
            .tambah,
            .form-cari,
            .aksi{
                display: none;
            }


        }
    </style>

</head>
<body>

    <a href="logout.php" class="logout">Logout</a> | <a href="cetak.php">Cetak</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="tambah">Tambah Daftar Siswa</a>
    <br>
    <br>

    <form action="" method="post" class="form-cari">

        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/loader.gif" class="loader" alt="">

    </form>

    <br>

    <div id="container">

    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No. </th>
        <th class="aksi">Aksi</th>
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
        <td class="aksi">
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

    

    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/script.js"></script>
</body>
</html>