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
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h5 class="mb-0 fw-bold">Edit Data Barang</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="index.php?page=edit_barang" method="POST">
                            <!-- INI PENTING: ID Barang disembunyikan buat tau barang mana yang mau diupdate -->
                            <input type="hidden" name="id_barang" value="<?php echo $barang_edit['id_barang']; ?>">

                            <div class="mb-3">
                                <label class="form-label text-muted">Nama Barang</label>
                                <!-- Tampilkan nama lama di dalam value -->
                                <input type="text" name="nama_barang" class="form-control" value="<?php echo $barang_edit['nama_barang']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Jumlah</label>
                                <!-- Tampilkan jumlah lama di dalam value -->
                                <input type="number" name="jumlah" class="form-control" value="<?php echo $barang_edit['jumlah']; ?>" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted">Kondisi</label>
                                <select name="kondisi" class="form-select" required>
                                    <!-- Logika biar opsi yang terpilih sesuai sama data lama -->
                                    <option value="Bagus" <?php if($barang_edit['kondisi'] == 'Bagus') echo 'selected'; ?>>Bagus</option>
                                    <option value="Bekas" <?php if($barang_edit['kondisi'] == 'Bekas') echo 'selected'; ?>>Bekas</option>
                                    <option value="Rusak" <?php if($barang_edit['kondisi'] == 'Rusak') echo 'selected'; ?>>Rusak</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-warning fw-bold w-100">UPDATE DATA</button>
                            <a href="index.php?page=barang" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>