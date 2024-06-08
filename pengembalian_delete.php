<?php
include("koneksi.php");

if (isset($_POST['bHapus'])) {
    $id_pengembalian = $_POST['id_pengembalian'];

    // Query untuk menghapus data berdasarkan id_pengembalian
    $query = "DELETE FROM pengembalian WHERE id_pengembalian = $id_pengembalian";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location.href='pengembalian.php';</script>"; // Ganti 'pengembalian.php' dengan halaman yang sesuai
    } else {
        // Jika terjadi kesalahan
        echo "<script>alert('Gagal menghapus data');</script>";
        echo "<script>window.location.href='pengembalian.php';</script>"; // Ganti 'pengembalian.php' dengan halaman yang sesuai
    }
} else {
    // Jika tidak ada data yang dikirimkan untuk dihapus
    echo "<script>alert('Tidak ada data yang dipilih untuk dihapus');</script>";
    echo "<script>window.location.href='pengembalian.php';</script>"; // Ganti 'pengembalian.php' dengan halaman yang sesuai
}
