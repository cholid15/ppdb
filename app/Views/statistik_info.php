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

<div class="container-xl">
    <div class="row mb-5 mt-5">
        <div class="col-xl-12">
            <div class="row g-4">
                <h1 class=" text-center mb-2">Statistik Calon Pendaftar</h1>
                <hr />
            </div>
            <div class="col-12">
                <div class="row row-cards">
                    <!-- TK 1 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            TK Sultan Agung 1
                                        </div>
                                        <div class="text-secondary">
                                            <?= $tk1 ? $tk1 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- TK 2 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            TK Sultan Agung 2
                                        </div>
                                        <div class="text-secondary">
                                            <?= $tk2 ? $tk2 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                    <!-- TK 4 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            TK Sultan Agung 4
                                        </div>
                                        <div class="text-secondary">
                                            <?= $tk4 ? $tk4 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- SD 1 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            SD Sultan Agung 1
                                        </div>
                                        <div class="text-secondary">
                                            <?= $sd1 ? $sd1 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- SD 2 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            SD Sultan Agung 2
                                        </div>
                                        <div class="text-secondary">
                                            <?= $sd2 ? $sd2 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- SD 3 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            SD Sultan Agung 3
                                        </div>
                                        <div class="text-secondary">
                                            <?= $sd3 ? $sd3 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- SMP 1 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            SMP Sultan Agung 1
                                        </div>
                                        <div class="text-secondary">
                                            <?= $smp1 ? $smp1 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SMP 4 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            SMP Sultan Agung 4
                                        </div>
                                        <div class="text-secondary">
                                            <?= $smp4 ? $smp4 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SMA 1 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            SMA Sultan Agung 1
                                        </div>
                                        <div class="text-secondary">
                                            <?= $sma1 ? $sma1 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SMA 4 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                                <path d="M16 8h2c1 0 2 1 2 2v11" />
                                                <path d="M3 21h18" />
                                                <path d="M10 12v0" />
                                                <path d="M10 16v0" />
                                                <path d="M10 8v0" />
                                                <path d="M7 12v0" />
                                                <path d="M7 16v0" />
                                                <path d="M7 8v0" />
                                                <path d="M17 12v0" />
                                                <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            SMA Sultan Agung 4
                                        </div>
                                        <div class="text-secondary">
                                            <?= $sma4 ? $sma4 . ' Calon Siswa' : 'Belum ada pendaftar'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>