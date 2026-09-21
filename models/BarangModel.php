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
}
?>