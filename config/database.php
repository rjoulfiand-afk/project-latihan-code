<?php
// config/database.php

$host = 'localhost';
$dbname = 'db_sas'; // Pastikan nama DB-nya sesuai sama punya lu
$db_user = 'root';
$db_pass = '';

try {
    // Membangun koneksi PDO (Versi lebih aman dari MySQLi)
    $koneksi = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $db_user, $db_pass);
    
    // Setel error mode, biar kalau ada salah query, dia ngasih tau errornya
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Kalau gagal nyambung, langsung stop
    die("Aduh gagal nyambung database lur: " . $e->getMessage());
}
?>