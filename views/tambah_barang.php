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
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0 fw-bold">Tambah Data Barang</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="index.php?page=tambah_barang" method="POST">
                            <div class="mb-3">
                                <label class="form-label text-muted">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted">Kondisi</label>
                                <select name="kondisi" class="form-select" required>
                                    <option value="Bagus">Bagus</option>
                                    <option value="Bekas">Bekas</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100 fw-bold">SIMPAN DATA</button>
                            <a href="index.php?page=barang" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>