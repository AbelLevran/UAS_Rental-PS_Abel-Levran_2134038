<?php
include("koneksi.php");

if (isset($_POST['bHapus'])) {
    $id_pembayaran = $_POST['id_pembayaran'];

    // Query untuk menghapus data berdasarkan id_pembayaran
    $query = "DELETE FROM pembayaran WHERE id_pembayaran = $id_pembayaran";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location.href='pembayaran.php';</script>"; // Ganti 'pembayaran.php' dengan halaman yang sesuai
    } else {
        // Jika terjadi kesalahan
        echo "<script>alert('Gagal menghapus data');</script>";
        echo "<script>window.location.href='pembayaran.php';</script>"; // Ganti 'pembayaran.php' dengan halaman yang sesuai
    }
} else {
    // Jika tidak ada data yang dikirimkan untuk dihapus
    echo "<script>alert('Tidak ada data yang dipilih untuk dihapus');</script>";
    echo "<script>window.location.href='pembayaran.php';</script>"; // Ganti 'pembayaran.php' dengan halaman yang sesuai
}
