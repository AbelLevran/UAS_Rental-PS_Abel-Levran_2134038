<?php
include("koneksi.php");

if (isset($_POST['bHapus'])) {
    $id_barang = $_POST['id_barang'];

    // Query untuk menghapus data berdasarkan id_barang
    $query = "DELETE FROM barang_sewaan WHERE id_barang = $id_barang";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location.href='barang.php';</script>";
    } else {
        // Jika terjadi kesalahan
        echo "<script>alert('Gagal menghapus data');</script>";
        echo "<script>window.location.href='barang.php';</script>";
    }
} else {
    // Jika tidak ada data yang dikirimkan untuk dihapus
    echo "<script>alert('Tidak ada data yang dipilih untuk dihapus');</script>";
    echo "<script>window.location.href='barang.php';</script>";
}
