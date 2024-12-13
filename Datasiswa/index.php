<?php 

//1. koneksi ke halaman connect.php menggunakan require
require 'connect.php';

//2. meminta semua data dari tabel yang bernama ultra
$ultraman = query("SELECT * FROM ultra");

// tombol cari di tekan
if (isset($_POST["submit"])) {
    // mencari mahasiswa berdasarkan keyword yang dimasukkan (membuat function baru)
    // buat fungsi di dalam $ultraman agar bisa menampilkan data sesuai dengan keyword yang dimasukkan
    $ultraman = coba($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Daftar Ultraman</h1>

    <a href="tambah.php">Tambah Data</a>

    <br>
    <br>

    <!-- membuat tampilan seacr -->
     <form action="" method="post">
        <input type="text" name="keyword" autofocus autocomplete="off" placeholder="seacr...">
        <button type="submit" name="submit">cari</button>
     </form>

    <br>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Host</th>
        <th>Ultra</th>
        <th>Gambar</th>
        <th>aksi</th>
    </tr>

    <?php $no = 1;?>
    <!-- 3. menampilkan semua data yang sudah jadi array assosiatif dan pastinya datanya lebih dari satu. maka dari itu perlu menggunakan pengulangan foreach -->
    <?php foreach($ultraman as $ultra):?>
        <tr>

            <td><?= $no?></td>
            <td><?= $ultra["nama"]?></td>
            <td><?= $ultra["lahir"]?></td>
            <td><?= $ultra["agama"]?></td>
            <td><?= $ultra["host"]?></td>
            <td><?= $ultra["ultra"]?> Tahun</td>
            <td><?= $ultra["gambar"]?></td>
            <td>

            <!-- mengirimkan id untuk memberitahu data dengan id berapa yang akan di hapus. pastikan ubah berada di atas hapus-->
            <a href="ubah.php?id=<?= $ultra["id"]?>">Ubah</a> |
            <a href="hapus.php?id=<?= $ultra["id"]?>">Hapus</a>
            </td>
                
        </tr>
    <?php $no++;?>
    <?php endforeach;?>

    </table>
    
</body>
</html>
