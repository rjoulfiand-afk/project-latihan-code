<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!-- Menggunakan bg-light agar latar belakang abu-abu terang, nggak bikin sakit mata -->
<body class="bg-light">
    
    <!-- NAVBAR ATAS -->
    <!-- Coba ganti bg-dark jadi bg-primary (biru) atau bg-success (hijau) kalau mau beda warna -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">App SAS Gw</a>
            
            <!-- Tombol Hamburger buat tampilan HP -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <!-- me-auto bikin menu ini rapat ke kiri. Kalau diganti ms-auto, dia rapat ke kanan -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item px-2"> <!-- px-2 ngasih padding kiri-kanan biar agak berjarak -->
                        <a class="nav-link active fw-bold" href="index.php?page=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <!-- INI PENTING: Kita arahin link ini ke rute baru bernama 'barang' -->
                        <a class="nav-link" href="index.php?page=barang">Data Barang</a>
                    </li>
                </ul>
                
                <!-- ms-3 ngasih margin (jarak) di sebelah kiri tombol logout -->
                <a href="index.php?page=logout" class="btn btn-danger btn-sm fw-bold ms-3">Logout</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <div class="container mt-4">
        
        <!-- CARD WELCOME -->
        <!-- border-0 membuang garis tepi bawaan, shadow-sm ngasih bayangan halus -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h4>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>! 🎉</h4>
                <p class="text-muted mb-0">Lu berhasil masuk ke halaman dashboard utama.</p>
            </div>
        </div>

        <!-- TEMPAT TABEL CRUD NANTI -->
        <div class="card border-0 shadow-sm">
            <!-- Header tabel, misal lu mau ganti bg-primary biar biru -->
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold">Daftar Inventaris</h5>
            </div>
            <div class="card-body">
                <p>Nanti tabel datanya kita taruh di dalem kotak ini cuy.</p>
            </div>
        </div>

    </div>

    <!-- Script Bootstrap buat fungsi dropdown & hamburger menu -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>