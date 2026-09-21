<?php
require_once 'config/database.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/BarangController.php'; // <--- PANGGIL CONTROLLER BARU

$auth = new AuthController($koneksi);
$barang = new BarangController($koneksi); // <--- BIKIN OBJECT BARANG

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'dashboard':
        require_once 'views/dashboard.php';
        break;
        
    case 'barang':
        $barang->index(); // <--- Nampilin tabel
        break;
        
    case 'tambah_barang':
        $barang->tambah(); // <--- Nampilin form / nyimpen data
        break;
        
    case 'hapus_barang':
        $barang->hapus(); // <--- Ngehapus data
        break;
        
    case 'logout':
        $auth->logout();
        break;

    default:
        $auth->login();
        break;
}
?>