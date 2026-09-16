<?php
class UserModel {
    private $db; // Variabel buat nyimpen koneksi database

    // Fungsi ini otomatis jalan pas file ini dipanggil, buat masukin koneksi database
    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    // Fungsi buat ngecek username dan password ke tabel users
    public function cekLogin($username, $password) {
        // Mencegah error keamanan gampang (SQL Injection)
        $username = mysqli_real_escape_string($this->db, $username);
        $password = mysqli_real_escape_string($this->db, $password);

        // Perintah SQL buat nyari data yang cocok
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        
        // Jalanin perintahnya
        $hasil = $this->db->query($query);

        // Kalau datanya ketemu (jumlah barisnya lebih dari 0)
        if ($hasil->num_rows > 0) {
            return $hasil->fetch_assoc(); // Balikin datanya (id, username, nama)
        } else {
            return false; // Kalau salah password/username, balikin false
        }
    }
}
?>