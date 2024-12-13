<!-- http://localhost/phpdasar/pertemuan7/latihan1.php?nama=Abdul%20Hafid&nip=0078653345 -->

<?php 

// variabel scope / lingkup variabel
//$x = 10 ; // variabel local

// function tampilx(){
//     global $x; 
//     echo $x; //var globals
// };

// tampilx();


// SUPERGLOBALS
//variabel global milik php
    //merupakan array asosiatif
        // echo $_SERVER["SERVER_NAME"]
        // var_dump($_SERVER);


//$_GET
    // $_GET["nama"] = "Abdul Hafid";
    // $_GET["nip"] = "007865342";
    // var_dump($_GET); [coba masukkan ini ke searc chrome "http://localhost/phpdasar/pertemuan7/latihan1.php?nama=Abdul%20Hafid&nip=0078653345" jangan lupa buka dulu var_dump($_GET)]
    $mahasiswa = [
        [
        "nama" => "Abdul Hafid",
        "NISN" => "008763423",
        "Email" => "redmatrix@gmail.com",
        "Jurusan" => "RPL",
        "gambar" => "p1.jpg"
        ],
        [
        "nama" => "Maulana Yahya",
        "NISN" => "007647598",
        "Email" => "Sinsu@gmail.com",
        "Jurusan" => "AKN",
        "gambar" => "p2.jpg"
        ],
        [
        "nama" => "Ridho Ramadani",
        "NISN" => "008745124",
        "Email" => "Rama@gmail.com",
        "Jurusan" => "MIPA",
        "gambar" => "p3.jpg"
        ],
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>

</head>
<body>

    <h1>Daftar Mahasiswa</h1>

    <ul>
        <?php foreach($mahasiswa as $mhs) :?>
        
                <!-- <li><img src="saga/<?= $mhs["gambar"]; ?>" alt=""></li> -->
                <li>
                    <a href="latihan2.php?
                    nama=<?= $mhs["nama"];?>&
                    NISN=<?= $mhs["NISN"];?>&
                    email=<?= $mhs["Email"];?>&
                    jurusan=<?= $mhs["Jurusan"];?>&
                    gambar=<?= $mhs["gambar"];?>
                    "><?= $mhs["nama"];?></a>
                </li>
                <!-- <li><?= $mhs["NISN"];?></li>
                <li><?= $mhs["Email"]; ?></li>
                <li><?= $mhs["Jurusan"]; ?></li> -->
        <?php endforeach?>
    </ul>

</body>
</html>