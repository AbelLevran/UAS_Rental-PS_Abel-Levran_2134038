<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Barang</title>
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
                <h3 class="text-center" style="color: orange;">Daftar<span style="color: white;"> Barang </span> </h3>
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
                            <th>Nama barang</th>
                            <th>Deskripsi</th>
                            </th>
                            <th>Harga Sewa harian</th>
                            <th>Status Ketersediaan</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                        include("koneksi.php");
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM barang_sewaan ");
                        while ($data = mysqli_fetch_array($tampil)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_barang'] ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td><?= $data['harga_sewa_harian'] ?></td>
                                <td><?= $data['status_ketersediaan'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">hapus</a>
                                </td>
                            </tr>

                            <!-- Awal Modal ubah-->
                            <div class=" modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-black text-white">
                                            <h1 class="modal-title fs-5" id="modalUbahLabel">Form Ubah Barang </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="barang_update.php">
                                            <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                                            <div class="modal-body">


                                                <div class="mb-3">
                                                    <label class="form-label">Nama Barang</label>
                                                    <input type="text" class="form-control" name="nama_barang" value="<?= $data['nama_barang'] ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" rows="3"><?= $data['deskripsi'] ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Harga Sewaan harian</label>
                                                    <input type="text" class="form-control" name="harga_sewa_harian" value="<?= $data['harga_sewa_harian'] ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Status Ketersediaan</label>
                                                    <select class="form-select" name="status_ketersediaan">
                                                        <option value="<?= $data['status_ketersediaan'] ?>"><?= $data['status_ketersediaan'] ?></option>
                                                        <option value="Tersedia">Tersedia</option>
                                                        <option value="Dipinjam">Dipinjam</option>
                                                    </select>
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
                            <!-- Awal Modal ubah-->

                            <!-- Awal Modal hapus-->
                            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="barang_delete.php">
                                            <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                                            <div class="modal-body">

                                                <h5 class="text-center">Anda yakin akan menghapus data ini? <br>
                                                    <span class="text-danger">ID - <?= $data['id_barang'] ?> - <?= $data['nama_barang'] ?></span>
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

                    <!-- Awal Modal ubah-->
                    <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-black text-white">
                                    <h1 class="modal-title fs-5" id="modalTambahLabel">Form input barang sewaan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="barang_insert.php">
                                    <div class="modal-body">


                                        <div class="mb-3">
                                            <label class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Harga Sewaan harian</label>
                                            <input type="text" class="form-control" name="harga_sewa_harian" placeholder="Rp.100.000">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status Ketersediaan</label>
                                            <select class="form-select" name="Status_ketersediaan">
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Dipinjam">Dipinjam</option>
                                            </select>
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
                    <!-- Awal Modal ubah-->


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