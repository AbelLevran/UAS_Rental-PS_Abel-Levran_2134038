<?php
include "koneksi.php";

if (isset($_POST['bsimpan'])){
    $simpan = mysqli_query($koneksi, "INSERT INTO pengembalian (barang, kondisi_barang_dikembalikan, denda)
    VALUES('$_POST[barang]',
           '$_POST[kondisi_barang_dikembalikan]',
           '$_POST[denda]')");
    
    if($simpan){
        echo "<script>
        alert('Data pengembalian berhasil disimpan!!');
        document.location='pengembalian.php';
        </script>";
    } else {
        echo "<script>
        alert('Data barang gagal disimpan!!');
        document.location='pengembalian.php';
        </script>";
    }
}

?>
