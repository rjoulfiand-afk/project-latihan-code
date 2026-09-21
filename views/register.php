<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun SAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Copy paste style dari login.php ke sini biar sama -->
    <style>
        body { background-color: #f4f7f6; }
        .card { border: none; border-radius: 15px; }
        .card-header { border-radius: 15px 15px 0 0 !important; background: linear-gradient(135deg, #198754, #20c997); } /* Warna hijau untuk register */
        .btn-success { border-radius: 25px; font-weight: bold; }
        .form-control { border-radius: 10px; }
    </style>
</head>
<body class="d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg">
                    <div class="card-header text-center text-white py-3">
                        <h4 class="mb-0">Buat Akun Baru</h4>
                        <small>Isi data dengan benar cuy</small>
                    </div>
                    <div class="card-body p-4">
                        
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Form ngarahnya ke index.php?page=register -->
                        <form action="index.php?page=register" method="POST">
                            <div class="mb-3">
                                <label class="form-label text-muted">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Username (Harus Unik)</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-2 mb-3 shadow-sm">DAFTAR SEKARANG</button>
                            
                            <div class="text-center">
                                <span class="text-muted">Udah punya akun?</span> 
                                <a href="index.php?page=login" class="text-decoration-none fw-bold text-success">Login sini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>