<?php
include "koneksi.php";

if (isset($_POST['bUbah'])) {
    $id_pengembalian = $_POST['id_pengembalian'];
    $barang = $_POST['barang'];
    $kondisi_barang_dikembalikan = $_POST['kondisi_barang_dikembalikan'];
    $denda = $_POST['denda'];

    $query = "UPDATE pengembalian SET
                barang='$barang',
                kondisi_barang_dikembalikan='$kondisi_barang_dikembalikan',
                denda='$denda'
                WHERE id_pengembalian='$id_pengembalian'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
            alert('Data pengembalian berhasil diubah!!');
            window.location.href='pengembalian.php';
            </script>";
    } else {
        echo "<script>
            alert('Data pengembalian gagal diubah!!');
            window.location.href='pengembalian.php';
            </script>";
    }
}
?>
