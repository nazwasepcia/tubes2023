<?php
include '../includes/db_connect.php';

if ($pdo) {
    echo "koneksi ke database berhasil!";
} else {
    echo "koneksi ke database gagal.";
}
?>