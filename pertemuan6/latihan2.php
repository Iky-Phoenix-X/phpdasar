<?php 

// $mahasiswa = [
//     ["Mubarok","008763423","TKJ","mubarok@gmail.com"],
//     ["Dwi Gayuh","008967548","TSM","Dwi07@gmail.com"],
//     ["Maulana","008764256","TSM","Maulana88@gmail.com"]
// ];

// array asosiatif
    // definisinya sama seperti array numerik,kecuali...
    // key-nya adalah string yang kita buat sendiri

    $mahasiswa = [
        [
        "nama" => "Abdul Hafid",
        "NIK" => "008763423",
        "Email" => "redmatrix@gmail.com",
        "Jurusan" => "RPL",
        "gambar" => "p1.jpg"
        ],
        [
        "nama" => "Maulana Yahya",
        "NIK" => "007647598",
        "Email" => "Sinsu@gmail.com",
        "Jurusan" => "AKN",
        "gambar" => "p2.jpg"
        ],
        [
        "nama" => "Ridho Ramadani",
        "NIK" => "008745124",
        "Email" => "Rama@gmail.com",
        "Jurusan" => "MIPA",
        "gambar" => "p3.jpg"
        // "tugas" => [90,80,100]
        ],
    ];

    // echo $mahasiswa[2]["tugas"][1];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .img{
            width: 50px;
            height: 50px;
        }
    </style>

</head>
<body>

    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) :?>
    <ul>
        <li>
            <img class="img" src="saga/<?= $mhs["gambar"];?>" alt="">
        </li>
        <li>Nama: <?= $mhs["nama"];?></li>
        <li>NIK: <?= $mhs["NIK"];?></li>
        <li>Jurusan: <?= $mhs["Email"];?></li>
        <li>Email: <?= $mhs["Jurusan"];?></li>
        <li>Email: <?= $mhs["gambar"];?></li>
    </ul>
    <?php endforeach?>
</body>
</html>