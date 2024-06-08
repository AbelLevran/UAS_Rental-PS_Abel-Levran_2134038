<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pembayaran</title>
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
                <h3 class="text-center" style="color: orange;">Daftar<span style="color: white;"> Pembayaran </span> </h3>
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
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Metode Pembayaran</th>
                            </th>
                            <th>Total Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Aksi</th>
                        </tr>

                        <?php

                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM pembayaran ");
                        while ($data = mysqli_fetch_array($tampil)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['barang'] ?></td>
                                <td><?= $data['metode_pembayaran'] ?></td>
                                <td><?= $data['total_pembayaran'] ?></td>
                                <td><?= $data['tanggal_pembayaran'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">hapus</a>
                                </td>
                            </tr>

                            <!-- Awal Modal hapus-->
                            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pembayaran_delete.php">
                                            <input type="hidden" name="id_pembayaran" value="<?= $data['id_pembayaran'] ?>">
                                            <div class="modal-body">

                                                <h5 class="text-center">Anda yakin akan menghapus data ini? <br>
                                                    <span class="text-danger">ID - <?= $data['id_pembayaran'] ?> - <?= $data['nama'] ?> - <?= $data['metode_pembayaran'] ?></span>
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

                            <!-- Awal Modal ubah-->
                            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-black text-white">
                                            <h1 class="modal-title fs-5" id="modalUbahLabel">Form Ubah Data Pembayaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pembayaran_update.php">
                                            <input type="hidden" name="id_pembayaran" value="<?= $data['id_pembayaran'] ?>">
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label class="form-label">Nama Pelanggan</label>
                                                    <select class="form-control" name="nama_pelanggan">
                                                        <?php
                                                        // Koneksi ke database (sesuaikan dengan koneksi Anda)
                                                        include 'koneksi.php';

                                                        // Query untuk mengambil nama pelanggan dari tabel pelanggan
                                                        $query_pelanggan = "SELECT * FROM pelanggan";
                                                        $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

                                                        // Tampilkan nama pelanggan sebagai opsi dalam dropdown
                                                        while ($row_pelanggan = mysqli_fetch_assoc($result_pelanggan)) {
                                                            $selected = ($row_pelanggan['nama'] == $data['nama']) ? 'selected' : '';
                                                            echo "<option value='" . $row_pelanggan['nama'] . "' $selected>" . $row_pelanggan['nama'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="paket">Nama Barang</label>
                                                    <select class="form-control" id="barang" name="barang">
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
                                                    <label class="form-label">Metode Pembayaran</label>
                                                    <select class="form-select" name="metode_pembayaran">
                                                        <option value="<?= $data['metode_pembayaran'] ?>"><?= $data['metode_pembayaran'] ?></option>
                                                        <option value="BRI">BRI</option>
                                                        <option value="BCA">BCA</option>
                                                        <option value="BSI">BSI</option>
                                                        <option value="Mandiri">Mandiri</option>
                                                        <option value="BNI">BNI</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Total Pembayaran</label>
                                                    <input type="text" class="form-control" name="total_pembayaran" value="<?= $data['total_pembayaran'] ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Pembayaran</label>
                                                    <input type="date" class="form-control" name="tanggal_pembayaran" value="<?= $data['tanggal_pembayaran'] ?>">
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
                            <!-- Awal Modal -->

                        <?php endwhile; ?>
                    </table>



                    <!-- Awal Modal insert-->
                    <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-black text-white">
                                    <h1 class="modal-title fs-5" id="modalTambahLabel">Form Input Data Pembayaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="pembayaran_insert.php">
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label">Nama Pelanggan</label>
                                            <select class="form-control" name="nama_pelanggan">
                                                <?php
                                                // Koneksi ke database (sesuaikan dengan koneksi Anda)
                                                include 'koneksi.php';

                                                // Query untuk mengambil nama pelanggan dari tabel pelanggan
                                                $query_pelanggan = "SELECT * FROM pelanggan";
                                                $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

                                                // Tampilkan nama pelanggan sebagai opsi dalam dropdown
                                                while ($row_pelanggan = mysqli_fetch_assoc($result_pelanggan)) {
                                                    echo "<option value='" . $row_pelanggan['nama'] . "'>" . $row_pelanggan['nama'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

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
                                            <label class="form-label">Metode Pembayaran</label>
                                            <select class="form-select" name="metode_pembayaran">
                                                <option value="BRI">BRI</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BSI">BSI</option>
                                                <option value="Mandiri">Mandiri</option>
                                                <option value="BNI">BNI</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Total Pembayaran</label>
                                            <input type="text" class="form-control" name="total_pembayaran" placeholder="Jumlah">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Pembayaran</label>
                                            <input type="date" class="form-control" name="tanggal_pembayaran">
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