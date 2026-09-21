<?php
require_once 'config/database.php';
require_once 'controllers/AuthController.php';

$auth = new AuthController($koneksi);
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'dashboard':
        require_once 'views/dashboard.php';
        break;
        
    case 'logout':
        $auth->logout();
        break;

    // HAPUS CASE 'register' DARI SINI!

    default:
        $auth->login();
        break;
}
?>