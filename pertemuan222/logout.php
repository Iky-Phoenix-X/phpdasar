<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();
// jika kamu aktifkan maka session di seluruh halaman akan terhenti

// setcookie('id', '', time() - 3600);
// setcookie('key', '', time() - 3600);
// jika kamu aktifkan maka cookie di seluruh halaman akan terhenti

header("location: login.php");
exit;

?>

