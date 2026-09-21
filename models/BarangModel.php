<?php
class BarangModel {
    private $db;

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    // TAMPIL DATA (READ)
    public function getSemuaBarang() {
        return $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC");
    }

    // TAMBAH DATA (CREATE)
    public function tambahBarang($nama, $jumlah, $kondisi) {
        // Amankan inputan biar nggak error kalau ada tanda petik
        $nama = mysqli_real_escape_string($this->db, $nama);
        $kondisi = mysqli_real_escape_string($this->db, $kondisi);
        
        $query = "INSERT INTO barang (nama_barang, jumlah, kondisi) VALUES ('$nama', '$jumlah', '$kondisi')";
        return $this->db->query($query);
    }

    // HAPUS DATA (DELETE)
    public function hapusBarang($id_barang) {
        // Pastikan ID itu angka, baru dihapus
        $id_barang = (int)$id_barang;
        return $this->db->query("DELETE FROM barang WHERE id_barang = $id_barang");
    }

    // AMBIL 1 BARANG SPESIFIK BUAT DITAMPILIN DI FORM EDIT
    public function getBarangById($id_barang) {
        $id_barang = (int)$id_barang; // Pastikan ID berupa angka
        $hasil = $this->db->query("SELECT * FROM barang WHERE id_barang = $id_barang");
        return $hasil->fetch_assoc(); // Balikin 1 baris data aja
    }

    // PROSES TIMPA (UPDATE) DATA KE DATABASE
    public function updateBarang($id_barang, $nama, $jumlah, $kondisi) {
        $id_barang = (int)$id_barang;
        $nama = mysqli_real_escape_string($this->db, $nama);
        $kondisi = mysqli_real_escape_string($this->db, $kondisi);

        $query = "UPDATE barang SET nama_barang = '$nama', jumlah = '$jumlah', kondisi = '$kondisi' WHERE id_barang = $id_barang";
        return $this->db->query($query);
    }
}
?>