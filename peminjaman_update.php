<?php
include "koneksi.php";

if (isset($_POST['bUbah'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_pembayaran = $_POST['status_pembayaran'];

    $query = "UPDATE peminjaman SET
                nama='$nama_pelanggan',
                barang='$barang',
                jumlah='$jumlah',
                harga='$harga',
                tanggal_peminjaman='$tanggal_peminjaman',
                tanggal_pengembalian='$tanggal_pengembalian',
                status_pembayaran='$status_pembayaran'
                WHERE id_peminjaman='$id_peminjaman'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
            alert('Data peminjaman berhasil diubah!!');
            document.location='peminjaman.php';
            </script>";
    } else {
        echo "<script>
            alert('Data peminjaman gagal diubah!!');
            document.location='peminjaman.php';
            </script>";
    }
}
?>
