<?php 

// menghubungkan ke halaman function.php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>

    <h1>Daftar Mahasiswa</h1>

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
            <a href="">Ubah</a> | 
            <a href="">Hapus</a>
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
    
</body>
</html>