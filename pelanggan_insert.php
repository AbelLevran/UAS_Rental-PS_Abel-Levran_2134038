<?php
include "koneksi.php";

if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO pelanggan (nama, alamat, no_telepon, email)
    VALUES('$_POST[nama]',
           '$_POST[alamat]',
           '$_POST[no_telepon]',
           '$_POST[email]')");

    if ($simpan) {
        echo "<script>
        alert('Data Pelanggan berhasil disimpan!!');
        document.location='pelanggan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Pelanggan gagal disimpan!!');
        document.location='pelanggan.php';
        </script>";
    }
}
