<?php
// Mulai session
session_start();

// Menghapus semua variabel session
$_SESSION = array();

// Menghancurkan session
session_destroy();

// Mengarahkan ke halaman login (atau halaman lain yang Anda inginkan)
header("Location: /tubes_new/index.php");
exit;
?>
