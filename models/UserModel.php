<?php
// models/UserModel.php

class UserModel {
    private $db;

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    // Fungsi Ngecek Login dengan keamanan Password_Verify
    public function cekLogin($username, $password) {
        // Pake PDO 'prepare' buat nutup celah SQL Injection
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kalau usernamenya ketemu
        if ($user) {
            // Cek password! Karena di database di-hash, kita nyocokinnya pakai password_verify()
            if (password_verify($password, $user['password'])) {
                return $user; // Password bener, balikin data user
            }
        }
        return false; // Password atau username salah
    }

    // Fungsi Bikin Akun dengan Enkripsi Password
    public function register($nama, $username, $password) {
        // Enkripsi passwordnya dulu sebelum dimasukin ke database
        // (Misal password "12345" bakal berubah jadi "$2y$10$abcdefghijklmnopqrstuvwxyz...")
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Pake PDO 'prepare' buat ngamanin inputan
        $stmt = $this->db->prepare("INSERT INTO users (nama_lengkap, username, password) VALUES (?, ?, ?)");
        
        // Eksekusi data ke database
        return $stmt->execute([$nama, $username, $hashedPassword]);
    }

    // Tambahan: Fungsi ngecek apakah username udah dipakai orang lain
    public function cekUsernameAda($username) {
        $stmt = $this->db->prepare("SELECT id_user FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}
?>