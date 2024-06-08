<?php
include "koneksi.php";

if (isset($_POST['bUbah'])){
    $ubah = mysqli_query($koneksi, "UPDATE pelanggan SET
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    no_telepon = '$_POST[no_telepon]',
    email = '$_POST[email]'
    WHERE id_pelanggan = '$_POST[id_pelanggan]'
    ");
    
    if($ubah){
        echo "<script>
        alert('Data pelanggan berhasil diubah!!');
        document.location='pelanggan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data pelanggan gagal diubah!!');
        document.location='pelanggan.php';
        </script>";
    }
}

?>