<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if (isset($_POST["nama"])) :?>
    <h1>Selamat Datang <?= $_POST["nama"];?></h1>
<?php endif;?>

<form action="" method="post">

    Masukkan Nama:
    <input type="text" name="nama">
    <br>
    <button type="submit" name="sabmit">kirim</button>

</form>

<?php if (isset($_POST["nam"])) :?>
    <h1>Selamat Datang <?= $_POST["nam"];?></h1>
<?php endif;?>

<form action="" method="post">

    Masukkan Nama:
    <input type="text" name="nam">
    <br>
    <button type="submit" name="sabmit">kirim</button>

</form>
    
</body>
</html>