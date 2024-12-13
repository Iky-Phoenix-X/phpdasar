<?php 

require 'functions.php';

// koneksi ke DBMS
// $conn = mysqli_connect("localhost","root","","phpdasar");

if(isset($_POST["submit"])) {

    var_dump($_POST);
    var_dump($_FILES);
    // var_dump(tambah($_POST));

    if (tambah($_POST) > 0) {
        echo '
            <script>
                alert("Data Berhasil Ditambahkan!");

                document.location.href = "index.php";
            </script>
        ';
        
    }else{
        echo "
        <script>
            alert('Data Gagal Ditambahkan!')

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

    <h1>Tambah Daftar Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">

        <ul>
        
            <li>
                <label for="nama">NAMA: </label>
                <input type="text" name="nama" id="nama" required>
            </li>

            <li>
                <label for="npsn">NISN: </label>
                <input type="text" name="npsn" id="npsn" required>
            </li>
        
            <li>
                <label for="email">EMAIL: </label>
                <input type="email" name="email" id="email" required>
            </li>
        
            <li>
                <label for="jurusan">JURUSAN: </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
        
            <li>
                <label for="gambar">GAMBAR: </label>
                <input type="file" name="gambar" id="gambar">
            </li>
        
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </ul>

    </form>
    
</body>
</html>
