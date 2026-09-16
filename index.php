<?php
// 1. Panggil koneksi database lu yang dibikin di awal tadi
require_once 'config/database.php';
// 2. Panggil controller buat login
require_once 'controllers/AuthController.php';

// 3. Bikin object (inisialisasi) controller-nya, masukin $koneksi biar bisa dipake
$auth = new AuthController($koneksi);

// 4. Ngecek URL, lagi buka halaman apa? defaultnya kosong (login)
$page = isset($_GET['page']) ? $_GET['page'] : '';

// 5. Polisi lalu lintas (Switch Case)
switch ($page) {
    case 'dashboard':
        // Kalau ngakses /index.php?page=dashboard, buka tampilan dashboard
        require_once 'views/dashboard.php';
        break;
        
    case 'logout':
        // Kalau ngakses /index.php?page=logout, panggil fungsi logout
        $auth->logout();
        break;

    default:
        // Kalau baru buka pertama kali, panggil fungsi login
        $auth->login();
        break;
}
?>