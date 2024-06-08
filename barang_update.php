<?php
include "koneksi.php";

if (isset($_POST['bUbah'])){
    $ubah = mysqli_query($koneksi, "UPDATE barang_sewaan SET
    nama_barang = '$_POST[nama_barang]',
    deskripsi = '$_POST[deskripsi]',
    harga_sewa_harian = '$_POST[harga_sewa_harian]',
    status_ketersediaan = '$_POST[status_ketersediaan]'
    WHERE id_barang = '$_POST[id_barang]'
    ");
    
    if($ubah){
        echo "<script>
        alert('Data barang berhasil diubah!!');
        document.location='barang.php';
        </script>";
    } else {
        echo "<script>
        alert('Data barang gagal diubah!!');
        document.location='barang.php';
        </script>";
    }
}

?>