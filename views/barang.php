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
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">App SAS Gw</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="index.php?page=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link active fw-bold" href="index.php?page=barang">Data Barang</a>
                    </li>
                </ul>
                <a href="index.php?page=logout" class="btn btn-danger btn-sm fw-bold ms-3">Logout</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN TABEL BARANG -->
    <div class="container mt-4">
        
        <!-- Notifikasi kalau sukses nambah atau hapus -->
        <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'sukses_tambah'): ?>
            <div class="alert alert-success alert-dismissible fade show">
                Data barang berhasil ditambah lur!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php elseif(isset($_GET['pesan']) && $_GET['pesan'] == 'sukses_hapus'): ?>
            <div class="alert alert-warning alert-dismissible fade show">
                Data barang udah lenyap dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-bold">Daftar Inventaris Barang</h5>
                
                <!-- INI YANG BARU: Link href-nya udah diarahkan ke rute tambah_barang -->
                <a href="index.php?page=tambah_barang" class="btn btn-success btn-sm fw-bold">+ Tambah Data</a>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Barang</th>
                            <th width="15%">Jumlah</th>
                            <th width="20%">Kondisi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- INI YANG BARU: Looping PHP untuk nampilin data asli dari Controller -->
                        <?php 
                        $no = 1;
                        // $data_barang ini dikirim dari BarangController.php
                        while($row = $data_barang->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td><?php echo $row['jumlah']; ?></td>
                            <td>
                                <!-- Warnain badge sesuai kondisi (Opsional, biar keren aja) -->
                                <?php 
                                    if($row['kondisi'] == 'Bagus') $warna = 'bg-primary';
                                    elseif($row['kondisi'] == 'Bekas') $warna = 'bg-warning text-dark';
                                    else $warna = 'bg-danger';
                                ?>
                                <span class="badge <?php echo $warna; ?>"><?php echo $row['kondisi']; ?></span>
                            </td>
                            <td>
                                <!-- Tombol Edit (Belum ada fungsinya) -->
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                
                                <!-- Tombol Hapus (Udah ada fungsinya + alert konfirmasi) -->
                                <a href="index.php?page=hapus_barang&id=<?php echo $row['id_barang']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin mau hapus barang ini cuy?');">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <!-- Kalau datanya kosong, kasih info -->
                        <?php if($data_barang->num_rows == 0): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data barang cuy. Silakan tambah data!</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>