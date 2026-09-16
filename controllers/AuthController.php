<?php
// Panggil modelnya biar kita bisa ngecek database
require_once 'models/UserModel.php';

class AuthController {
    private $model;

    // Buka koneksi pas class ini dipanggil
    public function __construct($koneksi) {
        $this->model = new UserModel($koneksi);
    }

    // Fungsi buat nampilin form login dan memproses login
    public function login() {
        // Ngecek apakah tombol submit di form login udah ditekan (pakai metode POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username']; // Ambil isian username
            $password = $_POST['password']; // Ambil isian password

            // Lempar datanya ke model buat dicek ke database
            $user = $this->model->cekLogin($username, $password);

            if ($user) {
                // Kalau bener, mulai SESSION (buat nginget kalau orang ini udah login)
                session_start();
                $_SESSION['is_login'] = true; // Kasih tanda true (udah login)
                $_SESSION['nama_lengkap'] = $user['nama_lengkap']; // Simpan namanya buat ditampilin
                
                // Pindahin halamannya ke dashboard
                header("Location: index.php?page=dashboard");
                exit;
            } else {
                // Kalau salah, kasih pesan error
                $error = "Aduh lur, Username atau Password salah!";
            }
        }

        // Kalau belum ngeklik tombol atau gagal login, tampilin form loginnya
        require_once 'views/login.php';
    }

    // Fungsi buat keluar (hapus sesi)
    public function logout() {
        session_start(); // Panggil sesi
        session_destroy(); // Hancurkan semua sesi (bikin log out)
        header("Location: index.php"); // Balikin ke halaman login
        exit;
    }
}
?>