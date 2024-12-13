<?php 

//1. menghubungkan ke file function(connect)
    require 'connect.php';

//2. ambil data dari url
$id = $_GET["id"];
// var_dump($id);

//3. queri(perintah) untuk mengambil database berdasarkan $id = $_GET["id"];
$isi = query("SELECT * FROM ultra WHERE id = $id") [0];
// var_dump($isi);

// //4. Cek apakah tombol submit sudah ditekan, jika sudah di tekan maka fungsi ubah() akan di jalankan
if (isset($_POST["submit"])) {

    // Menyimpan hasil dari fungsi ubah($_POST) ke dalam variabel
    $hasil = ubah($_POST);

    // Jika fungsi ubah berhasil
    if (ubah($_POST) > 0) {
        echo "<script>
                alert ('data berhasil di tambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
    else {
                echo "
                <script>
                    alert ('data gagal di tambahkan');
                    document.location.href = 'index.php';
                    </script>
                
                ";

    }
}


//     // Jika fungsi tambah berhasil
//     if ($hasil > 0) {
//         echo "
//             <script>
//             alert ('data berhasil di tambahkan');
//             document.location.href = 'index.php';
//             </script>
//         ";
//     } 

//     // Jika fungsi tambah gagal
//     else {
//         echo "
//         <script>
//             alert ('data gagal di tambahkan');
//             document.location.href = 'index.php';
//             </script>
        
//         ";

//         // Tampilkan pesan error dari database
//         echo mysqli_error($conn);
//     }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Ini Halaman Ubah</h1>

    <form action="" method="post">

            <input type="hidden" name="id" value="<?= $isi["id"]?>">

            <label for="nama">Nama: </label>
            <input type="text" name="nama" id="nama" required value="<?= $isi["nama"]?>"><br>

            <label for="lahir">Lahir: </label>
            <input type="text" name="lahir" id="lahir" required value="<?= $isi["lahir"]?>"><br>

            <label for="agama">Agama: </label>
            <input type="text" name="agama" id="agama" required value="<?= $isi["agama"]?>"><br>

            <label for="form">Host: </label>
            <input type="text" name="host" id="host" required value="<?= $isi["host"]?>"><br>

            <label for="ultra">Ultra: </label>
            <input type="text" name="ultra" id="ultra" required value="<?= $isi["ultra"]?>"><br>

            <label for="gambar">Gambar: </label>
            <input type="text" name="gambar" id="gambar" required value="<?= $isi["gambar"]?>"><br>

            <button type="submit" name="submit">Kirim</button>

    </form>

    
</body>
</html>