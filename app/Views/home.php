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
<?php if (site_url('/')) : ?>
<div id="carousel-captions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item carousel-item-next carousel-item-start">
            <img class="d-block w-100" alt=""
                src="<?= base_url("assets/static/photos/coffee-on-a-table-with-other-items.jpg") ?>">
            <div class="carousel-caption-background d-none d-md-block"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Slide label</h3>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" alt=""
                src="<?= base_url('assets/static/photos/young-entrepreneur-working-from-a-modern-cafe-2.jpg') ?>">
            <div class="carousel-caption-background d-none d-md-block"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Slide label</h3>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" alt=""
                src="<?= base_url('assets/static/photos/soft-photo-of-woman-on-the-bed-with-the-book-and-cup-of-coffee-in-hands.jpg') ?>">
            <div class="carousel-caption-background d-none d-md-block"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Slide label</h3>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" alt=""
                src="<?= base_url('assets/static/photos/fairy-lights-at-the-beach-in-bulgaria.jpg') ?>">
            <div class="carousel-caption-background d-none d-md-block"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Slide label</h3>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item active carousel-item-start">
            <img class="d-block w-100" alt=""
                src="<?= base_url('assets/static/photos/woman-working-on-laptop-at-home-office.jpg'); ?>">
            <div class="carousel-caption-background d-none d-md-block"></div>
            <div class="carousel-caption d-none d-md-block">
                <h3>Slide label</h3>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel-captions" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-captions" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<?php endif; ?>

<div class="container-xl">
    <div class="row mb-5 mt-5">
        <div class="col-xl-12">
            <div class="row g-4">
                <h1 class=" text-center mb-2">Pendaftaran</h1>
                <hr />
            </div>
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-md">
                        <div class="card-body text-center">
                            <div class="text-uppercase text-secondary font-weight-medium">Gelombang I</div>
                            <!-- <div class="display-5 fw-bold my-3">$0</div> -->
                            <div class="display-5 my-3"></div>
                            <ul class="list-unstyled lh-lg">
                                <li><strong>3</strong> Users</li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Sharing Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                    Design Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                    Private Messages
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                    Twitter API
                                </li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="#" class="btn w-100">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-md">
                        <div class="ribbon ribbon-top ribbon-bookmark bg-green">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                </path>
                            </svg>
                        </div>
                        <div class="card-body text-center">
                            <div class="text-uppercase text-secondary font-weight-medium">Premium</div>
                            <div class="display-5 fw-bold my-3">$49</div>
                            <ul class="list-unstyled lh-lg">
                                <li><strong>10</strong> Users</li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Sharing Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Design Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                    Private Messages
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                    Twitter API
                                </li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="#" class="btn btn-green w-100">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-md">
                        <div class="card-body text-center">
                            <div class="text-uppercase text-secondary font-weight-medium">Enterprise</div>
                            <div class="display-5 fw-bold my-3">$99</div>
                            <ul class="list-unstyled lh-lg">
                                <li><strong>100</strong> Users</li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Sharing Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Design Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Private Messages
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                    Twitter API
                                </li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="#" class="btn w-100">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-md">
                        <div class="card-body text-center">
                            <div class="text-uppercase text-secondary font-weight-medium">Unlimited</div>
                            <div class="display-5 fw-bold my-3">$139</div>
                            <ul class="list-unstyled lh-lg">
                                <li><strong>Unlimited</strong> Users</li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Sharing Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Design Tools
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Private Messages
                                </li>
                                <li>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Twitter API
                                </li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="#" class="btn w-100">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="h3">Enterprise-ready. Reach out for a custom quote.</h2>
                                    <p class="m-0 text-secondary">Tabler is designed to work great for large
                                        enterprises. Take a look at our feature comparison.</p>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn">
                                        Book a demo
                                    </a>
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