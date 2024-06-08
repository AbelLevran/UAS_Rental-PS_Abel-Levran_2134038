<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pengembalian</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('ps5.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <main>
        <div class="container">
            <div class="mt-3">
                <h3 class="text-center" style="color: orange;">Daftar<span style="color: white;"> Pengembalian </span> </h3>
            </div>
            <div class="card mt-3">
                <div class="card-header bg-black text-black text-center">
                    Data
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="bi bi-plus"></i> Tambah Data
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
                        </button>
                    </div>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kondisi Barang dikembalikan</th>
                            <th>Denda</th>
                            <th>Aksi</th>
                        </tr>

                        <?php

                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM pengembalian ");
                        while ($data = mysqli_fetch_array($tampil)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['barang'] ?></td>
                                <td><?= $data['kondisi_barang_dikembalikan'] ?></td>
                                <td><?= $data['denda'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">hapus</a>
                                </td>
                            </tr>

                            <!-- Awal Modal ubah-->
                            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-black text-white">
                                            <h1 class="modal-title fs-5" id="modalUbahLabel">Form Ubah Data Pengembalian</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pengembalian_update.php">
                                            <input type="hidden" name="id_pengembalian" value="<?= $data['id_pengembalian'] ?>">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="paket">Nama Barang</label>
                                                    <select class="form-control" id="jenis" name="barang">
                                                        <?php
                                                        // Ambil data paket dari database
                                                        $query_barang = "SELECT * FROM barang_sewaan";
                                                        $result_barang = mysqli_query($koneksi, $query_barang);

                                                        // Tampilkan sebagai opsi dalam dropdown
                                                        while ($row_barang = mysqli_fetch_assoc($result_barang)) {
                                                            $selected = ($row_barang['nama_barang'] == $data['barang']) ? 'selected' : '';
                                                            echo "<option value='" . $row_barang['nama_barang'] . "' $selected>" . $row_barang['nama_barang'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label">Kondisi Barang</label>
                                                    <select class="form-select" name="kondisi_barang_dikembalikan">
                                                        <option value="<?= $data['kondisi_barang_dikembalikan'] ?>"><?= $data['kondisi_barang_dikembalikan'] ?></option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Perlu perbaikan">Perlu perbaikan</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Denda</label>
                                                    <textarea class="form-control" name="denda" rows="3"><?= $data['denda'] ?></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">keluar</button>
                                                <button type="submit" class="btn btn-primary" name="bUbah">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir Modal -->

                            <!-- Awal Modal hapus-->
                            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pengembalian_delete.php">
                                            <input type="hidden" name="id_pengembalian" value="<?= $data['id_pengembalian'] ?>">
                                            <div class="modal-body">

                                                <h5 class="text-center">Anda yakin akan menghapus data ini? <br>
                                                    <span class="text-danger">ID - <?= $data['id_pengembalian'] ?> - <?= $data['barang'] ?> - kondisi <?= $data['kondisi_barang_dikembalikan'] ?></span>
                                                </h5>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="bHapus">Yes, Hapus</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">keluar</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir Modal hapus-->

                        <?php endwhile; ?>
                    </table>



                    <!-- Awal Modal insert -->
                    <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-black text-white">
                                    <h1 class="modal-title fs-5" id="modalTambahLabel">Form Input Data Pengembalian</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="pengembalian_insert.php">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="paket">Nama Barang</label>
                                            <select class="form-control" id="jenis" name="barang">
                                                <?php
                                                // Ambil data paket dari database
                                                $query_barang = "SELECT * FROM barang_sewaan";
                                                $result_barang = mysqli_query($koneksi, $query_barang);

                                                // Tampilkan sebagai opsi dalam dropdown
                                                while ($row_barang = mysqli_fetch_assoc($result_barang)) {
                                                    echo "<option value='" . $row_barang['nama_barang'] . "'>" . $row_barang['nama_barang'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Kondisi Barang</label>
                                            <select class="form-select" name="kondisi_barang_dikembalikan">
                                                <option value="Baik">Baik</option>
                                                <option value="Perlu perbaikan">Perlu perbaikan</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Denda</label>
                                            <textarea class="form-control" name="denda" rows="3"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">keluar</button>
                                        <button type="submit" class="btn btn-primary" name="bsimpan">simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal -->


                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Rental PlayStation 5</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>