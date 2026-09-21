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
    // Proses Edit Barang
    public function edit() {
        // Kalau tombol 'UPDATE DATA' diklik (POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_barang = $_POST['id_barang'];
            $nama = $_POST['nama_barang'];
            $jumlah = $_POST['jumlah'];
            $kondisi = $_POST['kondisi'];

            if ($this->model->updateBarang($id_barang, $nama, $jumlah, $kondisi)) {
                // Sukses update, lempar ke tabel dengan pesan sukses
                header("Location: index.php?page=barang&pesan=sukses_edit");
                exit;
            }
        } else {
            // Kalau cuma ngeklik tombol kuning 'Edit' di tabel (GET)
            if (isset($_GET['id'])) {
                $id_barang = $_GET['id'];
                // Panggil model buat nyari data barang lama
                $barang_edit = $this->model->getBarangById($id_barang);
                
                // Buka halaman form edit sambil bawa data $barang_edit
                require_once 'views/edit_barang.php';
            } else {
                header("Location: index.php?page=barang");
                exit;
            }
        }
    }
}
?>