<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sas";

$koneksi = new mysqli($host, $user, $pass, $db);

// Kalau gagal nyambung, tampilkan pesan error
if ($koneksi->connect_error) {
    die("Koneksi gagal bro: " . $koneksi->connect_error);
}
?>