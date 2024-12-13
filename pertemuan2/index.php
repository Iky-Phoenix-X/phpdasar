<!-- sintax dasar php -->

<?php 

// Pertemuan 2 - PHP Dasar
// Sintaks PHP

// Standar Output
// echo, print
// print_r()
// var_dump()

echo "Adity Maulana <br>";
print "Faris Mubarok<br>";   //echo dan print itu sama

print_r("Dwi Gayuh Ramadani<br>");
var_dump("Dwi Gayuh Ramadani<br>"); //menampilkan tipe data dan panjang huruf

echo true; //menghasilkan angka 1
echo false; //menghasilkan angka 0
echo "<br>";

// Penulisan Sintaks PHP
// => PHP di dalam HTML
// => Html di dalam PHP

// Variabel dan tipe data
// => tidak boleh diawali angka,tapi boleh mengandung angka(contoh: $nama1, $nama2)
$nama = "Faris Mubarok bin Rama";

echo "Hallo, Nama Saya $nama <br>"; //bisa mengecek apakah di dalam variabel ada nilainya/tidak.jika ada di tampilkan
echo 'Hallo, Nama Saya $nama <br>';//bisa dibilang tidak bisa membaca variabel/buka

// Operator
// => Aritmatika (+ - * / %)
echo 1 + 5;
echo "<br>";
$a = 50;
$b = 7;
echo $a + $b ;
echo "<br>";

// =>Penggaabung String / concatenation / concat
// .
$nama_D = "Faris";
$nama_b = "Mubarok";
echo $nama_D . " " .$nama_b . "<br>";

// => assigment (=, +=, -=, *=, /=, %=, .=)
$x = 3;
$x += 7;
echo "$x";
echo "<br>";
$D = "Faris ";
$D .= "Mubarok ";
$D .= "Bin Rama";
echo "$D <br><br>";

// => Operator perbandingan (<, >, ==, >=, <=, !=) //tidan mengecek tipe datanya tapi mengecek nilainya
var_dump(1 > 5); echo "<br>";
var_dump(1 == 5); echo "<br>";
var_dump(1 == "1"); echo "<br>";echo "<br>";

// => Identitas (===, !==) //Kebalikan dari Operator Perbandingan
var_dump(1 === "1"); echo "<br><br>";

// => Operator Logika (&&, ||, !)
$x = 10;
var_dump($x > 2 && $x % 2 == 0);echo "<br>"; 
$X = 31;
var_dump($X > 2 && $X % 2 == 0); echo "<br>"; //operator && keduanya harus benar untuk menghasilkan true
$z = 31;
var_dump($z > 2 || $z % 2 == 0); echo "<br>"; // operator || cukup salah satu benar maka akan menghasilkan true

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- PHP di dalam HTML(Lebih di sarankan katanya)  -->
    <h1>Hallo Selamat datang <?php echo $nama?></h1>
    <p><?php echo "Hai Gaes???";?></p>

    <!-- HTML di dalam PHP(tetapi tidak disarankan) -->
    <?php 
        echo "<h1>Selamat Datang Di Dunia Coding</h1>";
    ?>

</body>
</html>




