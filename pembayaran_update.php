<?php
include "koneksi.php";

if (isset($_POST['bUbah'])) {
    $id_pembayaran = $_POST['id_pembayaran'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $barang = $_POST['barang'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $total_pembayaran = $_POST['total_pembayaran'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

    $query = "UPDATE pembayaran SET
                nama='$nama_pelanggan',
                barang='$barang',
                metode_pembayaran='$metode_pembayaran',
                total_pembayaran='$total_pembayaran',
                tanggal_pembayaran='$tanggal_pembayaran'
                WHERE id_pembayaran='$id_pembayaran'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
            alert('Data pembayaran berhasil diubah!!');
            document.location='pembayaran.php';
            </script>";
    } else {
        echo "<script>
            alert('Data pembayaran gagal diubah!!');
            document.location='pembayaran.php';
            </script>";
    }
}
?>
