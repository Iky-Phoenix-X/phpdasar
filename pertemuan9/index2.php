<?php 

// koneksi ke databases
$conn = mysqli_connect("localhost","root","","phpdasar");

// ambil data dari tabel mahasiswa/query data mahasiswa
$result = mysqli_query($conn,"SELECT * FROM mahasiswa");
// var_dump($result);

// if (!$result) {
//     echo mysqli_error($conn);
// };

// ambil data (fecth) mahasuswa dari objek result/$result
// mysqli_fetch_row() mengembalikan array numerik (indek0,index1....)
// mysqli_fetch_assoc() mengembalikan array asosiatif
// mysqli_fetch_array() mengembalikan keduanya
// mysqli_fetch_object()


// while($row = mysqli_fetch_array($result)){
//     var_dump($row);
// }




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
    <?php while ($row = mysqli_fetch_assoc($result)):?>
    <tr>
        <td><?= $no?></td>
        <td>
            <a href="">Ubah</a> | 
            <a href="">Hapus</a>
        </td>
        <td><img src="saga/<?= $row["gambar"]?>" width="50" alt=""></td>
        <td><?= $row["npsn"]?></td>
        <td><?= $row["nama"]?></td>
        <td><?= $row["email"]?></td>
        <td><?= $row["jurusan"]?></td>
    </tr>
    <?php $no++;?>
    <?php endwhile?>

    </table>
    
</body>
</html>