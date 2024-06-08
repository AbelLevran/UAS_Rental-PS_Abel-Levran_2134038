<?php
include("koneksi.php");

if (isset($_POST['bHapus'])) {
    $id_peminjaman = $_POST['id_peminjaman'];

    // Query untuk menghapus data berdasarkan id_peminjaman
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id_peminjaman";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location.href='peminjaman.php';</script>"; // Ganti 'peminjaman.php' dengan halaman yang sesuai
    } else {
        // Jika terjadi kesalahan
        echo "<script>alert('Gagal menghapus data');</script>";
        echo "<script>window.location.href='peminjaman.php';</script>"; // Ganti 'peminjaman.php' dengan halaman yang sesuai
    }
} else {
    // Jika tidak ada data yang dikirimkan untuk dihapus
    echo "<script>alert('Tidak ada data yang dipilih untuk dihapus');</script>";
    echo "<script>window.location.href='peminjaman.php';</script>"; // Ganti 'peminjaman.php' dengan halaman yang sesuai
}
