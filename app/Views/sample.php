<?= $this->extend('Layout/Base'); ?>

<?= $this->section('content'); ?>
<div class="container-xl">
    <!-- Jika Akan Dibagi Menjadi Beberapa Bagian Bagian -->
    <div class="row row-cards">
        <!-- Tentukan Panjang Card -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus iste aut sint obcaecati cupiditate? Ipsam fuga iure reiciendis ex accusamus voluptates, accusantium incidunt magnam, repudiandae adipisci ducimus praesentium quis explicabo.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>