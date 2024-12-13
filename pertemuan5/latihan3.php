<?php 

// array multidimensi
$mahasiswa = [
    ["Mubarok","008763423","TKJ","mubarok@gmail.com"],
    ["Dwi Gayuh","008967548","TSM","Dwi07@gmail.com"],
    ["Maulana","008764256","TSM","Maulana88@gmail.com"]
]; //array numerik

// array asosiatif

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

    <!-- <ul>
        <li>Mubarok</li>
        <li>008763423</li>
        <li>TKJ</li>
        <li>mubarok@gmail.com</li>
    </ul> -->

    <!-- <ul>
        <?php foreach ($mahasiswa as $mhs) :?>
            <li><?= "$mhs"?></li>
        <?php endforeach;?>
    </ul> -->

    <!-- <?php foreach($mahasiswa as $mhs) :?>
    <ul>
        <?php foreach ($mhs as $siswa) :?>
            <li><?= "$siswa"?></li>
        <?php endforeach;?>
    </ul>
    <?php endforeach?> -->

    <?php foreach ($mahasiswa as $mhs) :?>
    <ul>
        <li>Nama: <?= $mhs[0];?></li>
        <li>NIK: <?= $mhs[1];?></li>
        <li>Jurusan: <?= $mhs[2];?></li>
        <li>Email: <?= $mhs[3];?></li>
    </ul>
    <?php endforeach;?>

</body>
</html>