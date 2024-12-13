<?php 
// cek apakah tombol submit sudah di pencet
if (isset($_POST["submit"])) {
    // cek user name dan passwordnya
    if (($_POST["username"]) == "admin" && ($_POST["password"]) == "123") {
        // jika benar redirect ke halaman admin
        header("Location: admin.php");
        exit;
    }else{
        // jika salah, tampilkan pesan kesalahan
        $error = true;
        // echo "Maaf, username dan password yang anda masukkan salah!!!";
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

<h1>Login Admin</h1>

<?php if (isset($error)):?>
    <p style="color: red; font-style:italic;">Username/password salah</p>
<?php endif;?>

<ul>
    <form action="" method="post">
        <li>
            <label for="username">User Name: </label>
            <input type="text" name="username" id="username">
        </li>
        <br>
        <li>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">Login</button>
        </li>
    </form>
</ul>
    
</body>
</html>


<!-- pelajari function afty -->