<?php 

session_start();
// cek apakah user sudah login apa belum, memakai session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// koneksi ke DBMS
// $conn = mysqli_connect("localhost","root","","phpdasar");

// ambil data di url
    $id = $_GET["id"];
    // var_dump($id);

// query data mahasiswa berdasarkan idnya
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
    // var_dump($mhs["nama"]);





// cek apakah tombol sibmit sudah ditekan
if(isset($_POST["submit"])) {

    // cek apakah data berhasil diubah / tidak
    if ( ubah($_POST) > 0) {
        echo '
            <script>
                alert("Data Berhasil DiUbah!");

                document.location.href = "index.php";
            </script>
        ';
        
    }else{
        echo "
        <script>
            alert('Data Gagal DiUbah!')

            document.location.href = 'index.php;
        </script>
    ";
            echo mysqli_error($conn);
    }

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

    <h1>Ubah Daftar Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data" >

        <input type="hidden" name="id" value="<?= $mhs["id"]?>">
        <input type="hidden" name="gambarLama" value="<?= isset($mhs["gambar"]) ? $mhs["gambar"] : '' ?>">

        <ul>
            <li>
                <label for="nama">NAMA: </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]?>">
            </li>

            <li>
                <label for="npsn">NISN: </label>
                <input type="text" name="npsn" id="npsn" required value="<?= $mhs["npsn"]?>">
            </li>
        
            <li>
                <label for="email">EMAIL: </label>
                <input type="email" name="email" id="email" required value="<?= $mhs["email"]?>">
            </li>
        
            <li>
                <label for="jurusan">JURUSAN: </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]?>">
            </li>
        
            <li>
                <label for="gambar">GAMBAR: </label>
                <img src="saga/<?= $mhs["gambar"]?>" width="50" height="50" alt="">
                <input type="file" name="gambar" id="gambar" >
            </li>
        
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </ul>

    </form>
    
</body>
</html>
