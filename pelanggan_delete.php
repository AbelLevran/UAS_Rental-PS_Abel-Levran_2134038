<?php
include("koneksi.php");

if (isset($_POST['bHapus'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    // Query untuk menghapus data berdasarkan id_pelanggan
    $query = "DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location.href='pelanggan.php';</script>"; // Ganti 'pelanggan.php' dengan halaman yang sesuai
    } else {
        // Jika terjadi kesalahan
        echo "<script>alert('Gagal menghapus data');</script>";
        echo "<script>window.location.href='pelanggan.php';</script>"; // Ganti 'pelanggan.php' dengan halaman yang sesuai
    }
}
