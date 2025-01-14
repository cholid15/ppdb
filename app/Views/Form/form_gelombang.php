<?= $this->extend('Layout/Base'); ?>

<?= $this->section('style'); ?>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<?= $this->endSection(); ?>

<?php

use Nim4n\SimpleDate;
?>



<?= $this->section('content'); ?>
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-10">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('ppdb/submit_gelombang_form') ?>" method="post" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Formulir</h4>
                    </div>

                    <div class="card-body bg-info text-white mx-3 my-3 rounded">
                        <h4>Informasi Gelombang Pendaftaran</h4>
                        <p><strong>Sekolah:</strong> <?= $gelombang['nama_sekolah']; ?></p>
                        <p><strong>Gelombang:</strong> <?= $gelombang['nama_gelombang']; ?></p>
                        <p><strong>Periode:</strong> <?= SimpleDate::date($gelombang['tanggal_buka']); ?> -
                            <?= SimpleDate::date($gelombang['tanggal_tutup']); ?></p>

                        <p><strong>Sisa Kuota:</strong> <?= $gelombang['kuota'] - $jumlah; ?> dari
                            <?= $gelombang['kuota']; ?></p>
                        <p><strong>Pendaftar:</strong>
                            <?= $jumlah ?> Calon Siswa</p>
                    </div>


                    <div class="card-body">
                        <!-- Menambahkan input hidden untuk id_gelombang -->
                        <input type="hidden" name="id_gelombang" value="<?= $gelombang['id_gelombang']; ?>">

                        <div class="row g-5">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">NISN</label>
                                        <input type="text" class="form-control" name="nisn" placeholder="NISN" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-5">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tmpt_lahir"
                                            placeholder="Tempat Lahir" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            placeholder="Pilih tanggal" value="<?= old('tanggal_lahir') ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row g-5">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-6">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="row g-5">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Asal Sekolah</label>
                                        <input type="text" class="form-control" name="asal_sekolah"
                                            placeholder="Asal Sekolah" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">No HP</label>
                                        <input type="text" class="form-control" name="no_hp" placeholder="No HP"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>




<?= $this->section('script'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // tanggal lahir calon siswa
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tanggal_lahir", {
            dateFormat: "Y-m-d", // Format tanggal
            // maxDate: "today", // Tidak boleh memilih tanggal setelah hari ini
        });
    });
</script>
<?= $this->endSection(); ?>