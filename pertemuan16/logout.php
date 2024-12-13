<?php 

session_start();
// $_SESSION = [];
// session_unset();
// session_destroy();
// jika kamu aktifkan maka session di seluruh halaman akan terhenti

header("location: login.php");
exit;

?>