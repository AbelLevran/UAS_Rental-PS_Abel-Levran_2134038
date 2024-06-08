<?php
// Pastikan ada koneksi ke database sebelumnya
include 'koneksi.php'; // Ubah sesuai dengan nama file dan lokasi koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirim dari formulir
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama_barang = $_POST['barang'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $total_pembayaran = $_POST['total_pembayaran'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

    // Query untuk menyimpan data ke dalam tabel pembayaran
    $query = "INSERT INTO pembayaran (nama, barang, metode_pembayaran, total_pembayaran, tanggal_pembayaran) 
              VALUES ('$nama_pelanggan', '$nama_barang', '$metode_pembayaran', '$total_pembayaran', '$tanggal_pembayaran')";

    if (mysqli_query($koneksi, $query)) {
        // Jika query berhasil dijalankan
        echo "<script>alert('Data pembayaran berhasil disimpan.');</script>";
        echo "<script>window.location='pembayaran.php';</script>";
        exit;
    } else {
        // Jika terjadi kesalahan dalam query
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location='pembayaran.php';</script>";
        exit;
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>
