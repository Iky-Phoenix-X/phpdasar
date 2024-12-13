<?php 
// koneksi ke databases
$conn = mysqli_connect("localhost","root","","phpdasar");

if ($conn == true) {
    echo"berhasil";
}else {
    echo"gagal";
}
?>