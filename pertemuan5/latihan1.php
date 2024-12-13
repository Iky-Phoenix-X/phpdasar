<?php 

// array
// var yang dapat menampung banyak nilai
// element pada array boleh memiliki tipe data yang berbeda
// pasangan key dan value
    // key-nya adalah index, yang dimulai dari 0
    // value adalah isinya

// 2 cara membuat array
// => cara lama: 
    $hari = array("Senin","Selasa","rabu");
// => cara baru
    $bulan = ["Januari", "Februari", "Maret"];
    $arrl = [123,"tulisan", false];

// menampilkan array 
// memakai var_damn / print_r()
    // var_dump($hari);
    // echo "<br>";
    // print_r($bulan);
    // echo "<br>";

// menampilkan 1 element pada array
    // echo "$arrl[0]";echo "<br>";
    // echo "$bulan[1]";

// menambahkan element baru pada array
    var_dump($hari);
    $hari[] = "kamis";
    $hari[] = "Jum'at";
    echo "<br>";
    var_dump($hari);

   
?>