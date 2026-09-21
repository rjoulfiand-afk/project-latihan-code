<?php
class UserModel {
    private $db;

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    // Fungsi buat ngecek Login
    public function cekLogin($username, $password) {
        $username = mysqli_real_escape_string($this->db, $username);
        $password = mysqli_real_escape_string($this->db, $password);

        $query = "SELECT * FROM users WHERE username = '$username'";
        $hasil = $this->db->query($query);

        if ($hasil->num_rows > 0) {
            $user = $hasil->fetch_assoc();
            if ($password == $user['password']) {
                return $user; 
            }
        }
        return false; 
    }

    // INI FUNGSI YANG BIKIN ERROR TADI KARENA BELUM ADA
    // Fungsi buat nyimpen data pendaftaran ke tabel users
    public function register($nama, $username, $password) {
        // Mencegah SQL Injection
        $nama = mysqli_real_escape_string($this->db, $nama);
        $username = mysqli_real_escape_string($this->db, $username);
        $password = mysqli_real_escape_string($this->db, $password);

        $query = "INSERT INTO users (nama_lengkap, username, password) VALUES ('$nama', '$username', '$password')";
        
        return $this->db->query($query);
    }
}
?>