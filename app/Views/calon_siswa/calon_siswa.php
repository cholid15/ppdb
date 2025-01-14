<?= form_open('/calon-siswa/update') ?>

<h3>Data Pribadi</h3>
<label>Nama:</label>
<input type="text" name="nama" value="<?= $calonSiswa['nama'] ?>" required>

<label>NIK:</label>
<input type="text" name="nik" value="<?= $calonSiswa['nik'] ?>" required>

<!-- Tambahkan field lain sesuai kebutuhan -->
<label>No HP:</label>
<input type="text" name="no_hp" value="<?= $calonSiswa['no_hp'] ?>" required>

<h3>Alamat</h3>
<?php foreach ($alamat as $item): ?>
    <label>Alamat:</label>
    <input type="text" name="alamat[]" value="<?= $item['alamat'] ?>">
<?php endforeach; ?>

<h3>Data Orang Tua</h3>
<?php foreach ($ortu as $item): ?>
    <label>Nama Orang Tua:</label>
    <input type="text" name="nama_ortu[]" value="<?= $item['nama_ortu'] ?>">
<?php endforeach; ?>

<h3>Data Wali</h3>
<?php foreach ($wali as $item): ?>
    <label>Nama Wali:</label>
    <input type="text" name="wali_nama[]" value="<?= $item['wali_nama'] ?>">
<?php endforeach; ?>

<button type="submit">Simpan</button>
<?= form_close() ?>