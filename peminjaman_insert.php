<?php
// Pastikan ada koneksi ke database sebelumnya
include 'koneksi.php'; // Ubah sesuai dengan nama file dan lokasi koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirim dari formulir
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama_barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Query untuk menyimpan data ke dalam tabel barang_sewaan
    $query = "INSERT INTO peminjaman (nama, barang, jumlah, harga, tanggal_peminjaman, tanggal_pengembalian, status_pembayaran) 
              VALUES ('$nama_pelanggan', '$nama_barang', '$jumlah', '$harga', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_pembayaran')";

    if (mysqli_query($koneksi, $query)) {
        // Jika query berhasil dijalankan
        echo "<script>alert('Data Peminjama berhasil disimpan!!');</script>";
        echo "<script>window.location='peminjaman.php';</script>";
        exit;
    } else {
        // Jika terjadi kesalahan dalam query
        echo "<script>alert('Data Peminjama gagal disimpan!!');</script>";
        echo "<script>window.location='peminjaman.php';</script>";
        exit;
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>
