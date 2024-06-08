<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pelanggan</title>
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
                <h3 class="text-center" style="color: orange;">Daftar<span style="color: white;"> Pelanggan </span> </h3>
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
                            <th>Nama </th>
                            <th>Alamat</th>
                            </th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>

                        <?php

                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM pelanggan ");
                        while ($data = mysqli_fetch_array($tampil)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['no_telepon'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">hapus</a>
                                </td>
                            </tr>

                            <!-- awal Modal ubah -->
                            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-black text-white">
                                            <h1 class="modal-title fs-5" id="modalUbahLabel">Form ubah data pelanggan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pelanggan_update.php">
                                            <input type="hidden" name="id_pelanggan" value="<?= $data['id_pelanggan'] ?>">
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Nomor Telepon</label>
                                                    <input type="text" class="form-control" name="no_telepon" value="<?= $data['no_telepon'] ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>">
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">keluar</button>
                                                <button type="submit" class="btn btn-primary" name="bUbah">ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Awal Modal ubah-->

                            <!-- Awal Modal hapus-->
                            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pelanggan_delete.php">
                                            <input type="hidden" name="id_pelanggan" value="<?= $data['id_pelanggan'] ?>">
                                            <div class="modal-body">

                                                <h5 class="text-center">Anda yakin akan menghapus data ini? <br>
                                                    <span class="text-danger">ID - <?= $data['id_pelanggan'] ?> - <?= $data['nama'] ?></span>
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
                            <!-- Awal Modal hapus-->

                        <?php endwhile; ?>
                    </table>



                    <!-- Awal Modal insert-->
                    <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-black text-white">
                                    <h1 class="modal-title fs-5" id="modalTambahLabel">Form input data pelanggan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="pelanggan_insert.php">
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" name="no_telepon" placeholder="Masukkan Nomor telepon">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
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
                    <!-- Awal Modal -->
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