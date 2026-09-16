<?php
session_start(); // Mulai sesi buat ngecek
// Kalau nggak ada tanda 'is_login', tendang ke halaman login
if (!isset($_SESSION['is_login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar simpel -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">App SAS Gw</a>
            <!-- Tombol Logout yang ngarah ke index.php?page=logout -->
            <a href="index.php?page=logout" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body text-center py-5">
                <!-- Nampilin nama dari database yang disimpen di sesi tadi -->
                <h2>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>! 🎉</h2>
                <p class="text-muted">Ini halaman dashboard lu bro. Nanti tabel data CRUD kita taruh di sini.</p>
            </div>
        </div>
    </div>
</body>
</html>