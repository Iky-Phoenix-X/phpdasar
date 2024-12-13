<?php 

session_start();
// cek apakah user sudah login apa belum, memakai session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo '
        <script>
            alert("Data Berhasil DiHapus!");
            document.location.href = "index.php";
        </script>
    ';
}else {
    echo '
        <script>
            alert("Data Gagal DiHapus");
            document.location.href = "index.php";
        </script>
    ';
}


?>