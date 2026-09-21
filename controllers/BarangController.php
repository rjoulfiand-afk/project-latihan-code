<?php
require_once 'models/BarangModel.php';

class BarangController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new BarangModel($koneksi);
    }

    // Tampilkan halaman tabel
    public function index() {
        // Ambil data dari database pakai model
        $data_barang = $this->model->getSemuaBarang();
        require_once 'views/barang.php';
    }

    // Tampilkan form tambah & proses simpannya
    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama_barang'];
            $jumlah = $_POST['jumlah'];
            $kondisi = $_POST['kondisi'];

            if ($this->model->tambahBarang($nama, $jumlah, $kondisi)) {
                // Balik ke tabel kalau sukses
                header("Location: index.php?page=barang&pesan=sukses_tambah");
                exit;
            }
        }
        // Kalau belum submit, panggil form html-nya
        require_once 'views/tambah_barang.php';
    }

    // Proses hapus barang
    public function hapus() {
        if (isset($_GET['id'])) {
            $id_barang = $_GET['id'];
            $this->model->hapusBarang($id_barang);
        }
        // Balik ke tabel
        header("Location: index.php?page=barang&pesan=sukses_hapus");
        exit;
    }
}
?>