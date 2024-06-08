<?php
include "koneksi.php";

if (isset($_POST['bsimpan'])){
    $simpan = mysqli_query($koneksi, "INSERT INTO barang_sewaan (nama_barang, deskripsi, harga_sewa_harian, status_ketersediaan)
    VALUES('$_POST[nama_barang]',
           '$_POST[deskripsi]',
           '$_POST[harga_sewa_harian]',
           '$_POST[status_ketersediaan]')");
    
    if($simpan){
        echo "<script>
        alert('Data barang berhasil disimpan!!');
        document.location='barang.php';
        </script>";
    } else {
        echo "<script>
        alert('Data barang gagal disimpan!!');
        document.location='barang.php';
        </script>";
    }
}

?>