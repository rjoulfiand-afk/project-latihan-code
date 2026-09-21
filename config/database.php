<?php
// Pengaturan default bawaan XAMPP
$host = "localhost";
$user = "root";
$pass = "";

$db   = "db_sas";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Aduh gagal nyambung lur: " . $koneksi->connect_error);
}
?>