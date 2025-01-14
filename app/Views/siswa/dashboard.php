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

<h1 class="container">Hai hai ini Siswa</h1>

<!-- <php 
dd(auth()->user()->getEmailIdentity()->name) 

?> -->



<?= $this->endSection(); ?>




<?= $this->section('script'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<?= $this->endSection(); ?>