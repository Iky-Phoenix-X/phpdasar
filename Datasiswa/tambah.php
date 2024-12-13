<?php 

//1. menghubungkan ke file function(connect)
require 'connect.php';

//2. Cek apakah tombol submit sudah ditekan, jika sudah di tekan maka fungsi tambah() akan di jalankan
if (isset($_POST["submit"])) {

    // var_dump($_POST);
    var_dump($_FILES);
    // var_dump(tambah($_POST));


    // Menyimpan hasil dari fungsi tambah($_POST) ke dalam variabel
    $hasil = tambah($_POST);

    // Jika fungsi tambah berhasil
    if ($hasil > 0) {
        echo "
            <script>
            alert ('data berhasil di tambahkan');
            document.location.href = 'index.php';
            </script>
        ";
    } 

    // // // Jika fungsi tambah gagal
    else {
        echo "
        <script>
            alert ('data gagal di tambahkan');
            document.location.href = 'index.php';
            </script>
        
        ";

    // //     // Tampilkan pesan error dari database
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

    <h1>Ini Halaman Tambah</h1>

    <form action="" method="post" enctype="multipart/form-data">

    <label for="nama">Nama: </label>
    <input type="text" name="nama" id="nama" required ><br>

    <label for="lahir">Lahir: </label>
    <input type="text" name="lahir" id="lahir" required ><br>

    <label for="agama">Agama: </label>
    <input type="text" name="agama" id="agama" required ><br>

    <label for="form">Host: </label>
    <input type="text" name="host" id="host" required ><br>

    <label for="ultra">Ultra: </label>
    <input type="text" name="ultra" id="ultra" required ><br>

    <label for="gambar">Gambar: </label>
    <input type="file" name="gambar" id="gambar" ><br>

    <button type="submit" name="submit">Kirim</button>

    </form>

    
</body>
</html>