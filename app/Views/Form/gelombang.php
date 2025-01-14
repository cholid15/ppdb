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



<?= $this->section('content'); ?>
<div class="container-xl">
    <div class="row">
        <?php foreach ($gelombang as $item): ?>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?= esc($item['nama_gelombang'] ?? 'Gelombang Tidak Diketahui') ?>
                    </h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">
                                    <?= esc($item['nama_sekolah'] ?? 'Sekolah Tidak Diketahui') ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">
                                    Biaya Pendaftaran: Rp
                                    <?= number_format($item['biaya_pendaftaran'] ?? 0, 0, ',', '.') ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">
                                    Kuota: <?= esc($item['kuota'] ?? '0') ?> siswa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card footer -->
            <div class="card-footer">
                <div class="col-4 col-sm-4 col-md-2 col-xl-auto mb-2">
                    <a href="<?= url_to('ppdb.form_gelombang', $item['id_gelombang']) ?>" class="btn btn-green w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

</div>


<?= $this->endSection(); ?>




<?= $this->section('script'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
$(document).ready(function() {
    // Tambahkan class active saat item diklik
    $('.list-group-item').click(function() {
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');
    });
});

// tanggal lahir calon siswa
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#tanggal_lahir", {
        dateFormat: "Y-m-d", // Format tanggal
        maxDate: "today", // Tidak boleh memilih tanggal setelah hari ini
    });
});

// tanggal lahir orang tua
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#tgl_lahir_ortu", {
        dateFormat: "Y-m-d", // Format tanggal
        maxDate: "today", // Tidak boleh memilih tanggal setelah hari ini
    });
});

// tanggal lahir wali
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#tgl_lahir_wali", {
        dateFormat: "Y-m-d", // Format tanggal
        maxDate: "today", // Tidak boleh memilih tanggal setelah hari ini
    });
});
</script>
<?= $this->endSection(); ?>