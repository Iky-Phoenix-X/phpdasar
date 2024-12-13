<?php 

session_start();
// cek apakah user sudah login apa belum, memakai session
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// menghubungkan ke function.php
require 'functions.php';

// cek apakah tombol ligin sudah di tekan
if (isset($_POST["login"])) {
    
    // 
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE BINARY  username = '$username'";
    $result = mysqli_query($conn, $query); 
    //WHERE itu mencari username yang sama seperti yang dimasukkan user.  //BINARY: agar bisa membedakan besar kecilnya huruf(john_doe sama dengan John_Doe.)

    // cek username
    if (mysqli_num_rows($result) === 1) {

         // cek password
         $row = mysqli_fetch_assoc($result);
         if (password_verify($password, $row["password"])) {
            // Password benar, redirect ke halaman index

            // set session
            $_SESSION["login"] = true ;

            header("Location: index.php");
            exit;
        } else {
            // Password salah
            echo "Password salah!";
        }
    }

    $error = true;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
    label{
        display: block;
    }
    </style>
</head>
<body>

    <h1>Halaman Login</h1>

    <?php if (isset($error)) :?>
        <i><p style="color:red;">Usernamee / Password Salah!!!</p></i>
    <?php endif?>

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
                <button type="submit" name="login">Sig In</button>
            </li>
        </ul>

    </form>
    
</body>
</html>