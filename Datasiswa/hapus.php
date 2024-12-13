<?php 
// menghubungkan ke connect.php
require 'connect.php';

//1. menangkap id = <?= $ultra["id"]> dari index.php dan menyimpannya ke $id
$id = $_GET["id"];

// $hasil = hapus($id);


if (hapus($id) > 0 ){
    echo "
            <script>
            alert ('data berhasil di hapus');
            document.location.href = 'index.php';
            </script>
        ";
}else {
    echo "
            <script>
            alert ('data gagal di hapus');
            document.location.href = 'index.php';
            </script>
        ";
}


?>