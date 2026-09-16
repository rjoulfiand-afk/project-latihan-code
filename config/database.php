<?php
// Pengaturan default bawaan XAMPP
$host = "localhost";
$user = "root";
$pass = "";

// Nama database yang udah lu bikin di phpMyAdmin
$db   = "db_sas";

// Bikin koneksi ke MySQL
$koneksi = new mysqli($host, $user, $pass, $db);

// Cek kalau misal XAMPP belum nyala atau nama database salah
if ($koneksi->connect_error) {
    die("Aduh gagal nyambung lur: " . $koneksi->connect_error);
}
?>