<?= $this->extend('Layout/Base'); ?>

<?= $this->section('style'); ?>
<style>
.carousel img {
    width: 100%;
    height: 450px;
    object-fit: cover;
}
</style>
<?= $this->endSection(); ?>

<?php

use Nim4n\SimpleDate;
?>


<?= $this->section('content'); ?>

<?php if (!empty($header)) : ?>
<!-- Page Header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <?= $header['pretitle'] ?>
                </div>
                <h2 class="page-title">
                    <?= $header['title'] ?>
                </h2>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<!-- Page body -->

<div class="page-body">
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">Daftar Calon Pendaftar</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Sekolah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($calonSiswa)) : ?>
                                    <?php
                                        $currentPage = $pager->getCurrentPage('calon_siswa'); // Ambil halaman saat ini
                                        $perPage = $pager->getPerPage('calon_siswa'); // Ambil jumlah data per halaman
                                        $start = ($currentPage - 1) * $perPage; // Hitung nomor awal
                                        ?>
                                    <?php foreach ($calonSiswa as $index => $siswa) : ?>
                                    <tr>
                                        <td><?= $start + $index + 1; ?></td> <!-- Penomoran -->
                                        <td><?= esc($siswa['nama']); ?></td>
                                        <td><?= esc($siswa['nisn']); ?></td>
                                        <td><?= esc($siswa['tmpt_lahir']); ?></td>
                                        <td><?= SimpleDate::date($siswa['tanggal_lahir']); ?></td>
                                        <td><?= $siswa['jk'] == 'L' ? 'Laki-Laki' : ($siswa['jk'] == 'P' ? 'Perempuan' : ''); ?>
                                        </td>
                                        <td><?= esc($siswa['sekolah']); ?></td>
                                        <td>
                                            <a href="<?= route_to('ppdb.detail', $siswa['id']); ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data siswa</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <?= $pager->links('calon_siswa', 'tabler') ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>