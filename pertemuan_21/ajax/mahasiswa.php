<?php 

sleep(1);

// menghubunngkan ke function.php
require '../functions.php';

$keyword = $_GET["keyword"]; //ini dapat dari ajax dan dikirim dari js pada bagian (keyword.value)


$query = "SELECT * FROM mahasiswa WHERE
                nama LIKE '%$keyword%' OR
                npsn LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
                ";
$mahasiswa = query($query);

// var_dump($mahasiswa);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
    
</body>
</html>