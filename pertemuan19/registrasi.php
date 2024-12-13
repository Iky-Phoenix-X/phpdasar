<?php 

require 'functions.php';

// jika tombol register di tekan
if (isset($_POST["register"])) {
    
    if (registrasi($_POST) > 0) {
        echo '
        <script>
            alert("User Baru Berhasil Ditambahkan");
            document.location.href = "registrasi.php";
        </script>
    ';
    
    }else{
        echo "
        <script>
            alert('User Baru Gagal Ditambahkan')
            document.location.href = 'registrasi.php';
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
    <title>Halaman Registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>

    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password: </label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Sig Up</button>
            </li>
        </ul>
    </form>
    
</body>
</html>