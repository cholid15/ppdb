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
        <!-- Sidebar Menu -->
        <div class="col-xl-3">
            <div class="card sticky-top" style="top: 80px;">
                <div class="card-header">
                    <h3 class="card-title">Lengkapi Biodata</h3>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#biodata" class="list-group-item list-group-item-action">
                        1. Biodata
                    </a>
                    <a href="#alamat" class="list-group-item list-group-item-action">
                        2. Alamat
                    </a>
                    <a href="#orangTua" class="list-group-item list-group-item-action">
                        3. Orang Tua
                    </a>
                    <a href="#waliSiswa" class="list-group-item list-group-item-action">
                        4. Wali Siswa
                    </a>

                    <a href="#uploadFile" class="list-group-item list-group-item-action">
                        4. Upload File
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <?php if (session()->has('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>


                    <?php if (session()->has('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('ppdb/simpan') ?>" method="POST" id="dataForm"
                        enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- Biodata -->
                        <div class="card-header" id="biodata">
                            <h4 class="card-title">Biodata</h4>
                        </div>
                        <div class="row mt-3" id="biodataRow">
                            <!-- <div class="col-6 mb-3">
                                <label class="form-label">No Pendaftaran</label>
                                <input type="text"
                                    class="form-control <= (session('errors.no_pendaftaran')) ? 'is-invalid' : '' ?>"
                                    name="no_pendaftaran" placeholder="Masukkan Nomor Pendaftaran"
                                    value="<= old('no_pendaftaran') ?>">
                                <div class="invalid-feedback">
                                    <= session('errors.no_pendaftaran') ?>
                                </div>
                            </div> -->

                            <div class="col-12 mb-3">
                                <label class="form-label">Pilih Sekolah</label>
                                <select class="form-select <?= (session('errors.id_sekolah')) ? 'is-invalid' : '' ?>"
                                    name="id_sekolah">
                                    <option value="" selected disabled>Pilih Sekolah</option>
                                    <?php foreach ($sekolah as $school) : ?>
                                        <option value="<?= $school['id'] ?>"
                                            <?= old('id_sekolah') == $school['id'] ? 'selected' : '' ?>>
                                            <?= $school['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= session('errors.id_sekolah') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">NIS</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.nis')) ? 'is-invalid' : '' ?>" name="nis"
                                    placeholder="Masukkan NIS" value="<?= old('nis') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nis') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">NISN</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.nisn')) ? 'is-invalid' : '' ?>" name="nisn"
                                    placeholder="Masukkan NISN" value="<?= old('nisn') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nisn') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.nik')) ? 'is-invalid' : '' ?>" name="nik"
                                    placeholder="Masukkan NIK (16 digit)" value="<?= old('nik') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nik') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">No KK</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.no_kk')) ? 'is-invalid' : '' ?>"
                                    name="no_kk" placeholder="Masukkan No KK (16 digit)" value="<?= old('no_kk') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_kk') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">No Akta Lahir</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.no_akte_lahir')) ? 'is-invalid' : '' ?>"
                                    name="no_akta_lahir" placeholder="Masukkan Nomor Akta Lahir"
                                    value="<?= old('no_akta_lahir') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_akta_lahir') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.nama')) ? 'is-invalid' : '' ?>" name="nama"
                                    placeholder="Masukkan Nama Lengkap" value="<?= old('nama') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nama') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.tmpt_lahir')) ? 'is-invalid' : '' ?>"
                                    name="tmpt_lahir" placeholder="Masukkan Tempat Lahir"
                                    value="<?= old('tmpt_lahir') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.tmpt_lahir') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <!-- <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                                    placeholder="Pilih Tanggal Lahir" required> -->
                                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    placeholder="Pilih tanggal" value="<?= old('tanggal_lahir') ?>" required>
                            </div>

                            <div class="col-6 mb-3">
                                <div class="form-label">Jenis Kelamin</div>
                                <select class="form-select" name="jk">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="L" <?= (old('jk') == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= (old('jk') == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Tinggi Badan</label>
                                <div class="input-group mb-2">
                                    <input type="text"
                                        class="form-control <?= (session('errors.tinggi_badan')) ? 'is-invalid' : '' ?>"
                                        name="tinggi_badan" placeholder="Masukkan Tinggi Badan"
                                        value="<?= old('tinggi_badan') ?>">
                                    <span class="input-group-text">
                                        CM
                                    </span>
                                </div>

                                <div class="invalid-feedback">
                                    <?= session('errors.tinggi_badan') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Berat Badan</label>


                                <div class="input-group mb-2">
                                    <input type="text"
                                        class="form-control <?= (session('errors.berat_badan')) ? 'is-invalid' : '' ?>"
                                        name="berat_badan" placeholder="Masukkan Berat Badan"
                                        value="<?= old('berat_badan') ?>">
                                    <span class="input-group-text">
                                        KG
                                    </span>
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.berat_badan') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <div class="form-label">Anak Ke-</div>
                                <select class="form-select" name="anak_ke" required>
                                    <option value="" selected disabled>Anak Ke</option>
                                    <option value="1" <?= (old('anak_ke') == '1') ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= (old('anak_ke') == '2') ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= (old('anak_ke') == '3') ? 'selected' : '' ?>>3</option>
                                    <option value="4" <?= (old('anak_ke') == '4') ? 'selected' : '' ?>>4</option>
                                    <option value="5" <?= (old('anak_ke') == '5') ? 'selected' : '' ?>>5</option>
                                    <option value="6" <?= (old('anak_ke') == '6') ? 'selected' : '' ?>>6</option>
                                    <option value="7" <?= (old('anak_ke') == '7') ? 'selected' : '' ?>>7</option>
                                    <option value="8" <?= (old('anak_ke') == '8') ? 'selected' : '' ?>>8</option>
                                    <option value="9" <?= (old('anak_ke') == '9') ? 'selected' : '' ?>>9</option>
                                    <option value="10" <?= (old('anak_ke') == '10') ? 'selected' : '' ?>>10</option>
                                </select>
                            </div>


                            <div class="col-6 mb-3">
                                <div class="form-label">Jumlah Saudara</div>
                                <select class="form-select" name="jml_saudara" required>
                                    <option value="" selected disabled>Jumlah Saudara</option>
                                    <option value="1" <?= (old('jml_saudara') == '1') ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= (old('jml_saudara') == '2') ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= (old('jml_saudara') == '3') ? 'selected' : '' ?>>3</option>
                                    <option value="4" <?= (old('jml_saudara') == '4') ? 'selected' : '' ?>>4</option>
                                    <option value="5" <?= (old('jml_saudara') == '5') ? 'selected' : '' ?>>5</option>
                                    <option value="6" <?= (old('jml_saudara') == '6') ? 'selected' : '' ?>>6</option>
                                    <option value="7" <?= (old('jml_saudara') == '7') ? 'selected' : '' ?>>7</option>
                                    <option value="8" <?= (old('jml_saudara') == '8') ? 'selected' : '' ?>>8</option>
                                    <option value="9" <?= (old('jml_saudara') == '9') ? 'selected' : '' ?>>9</option>
                                    <option value="10" <?= (old('jml_saudara') == '10') ? 'selected' : '' ?>>10</option>
                                </select>
                            </div>


                            <div class="col-6 mb-3">
                                <div class="form-label">Agama</div>
                                <select class="form-select" name="agama" required>
                                    <option value="" selected disabled>Pilih Agama</option>
                                    <option value="Islam" <?= (old('agama') == 'Islam') ? 'selected' : '' ?>>Islam
                                    </option>
                                    <option value="Kristen_protestan"
                                        <?= (old('agama') == 'Kristen_protestan') ? 'selected' : '' ?>>Kristen Protestan
                                    </option>
                                    <option value="Kristen_katolik"
                                        <?= (old('agama') == 'Kristen_katolik') ? 'selected' : '' ?>>Kristen Katolik
                                    </option>
                                    <option value="Hindu" <?= (old('agama') == 'Hindu') ? 'selected' : '' ?>>Hindu
                                    </option>
                                    <option value="Buddha" <?= (old('agama') == 'Buddha') ? 'selected' : '' ?>>Buddha
                                    </option>
                                    <option value="Konghucu" <?= (old('agama') == 'Konghucu') ? 'selected' : '' ?>>
                                        Konghucu</option>
                                </select>
                            </div>


                            <div class="col-6 mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.no_hp')) ? 'is-invalid' : '' ?>"
                                    name="no_hp" placeholder="Masukkan Nomor Akta Lahir" required
                                    value="<?= old('no_hp') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_hp') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>"
                                    name="email" placeholder="Masukkan Email" value="<?= old('email') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <div class="form-label">Pendidikan Terakhir</div>
                                <select class="form-select" name="pendidikan_terakhir" required>
                                    <option value="" selected disabled>Pilih Jenjang</option>
                                    <option value="TK" <?= (old('pendidikan_terakhir') == 'TK') ? 'selected' : '' ?>>TK
                                    </option>
                                    <option value="SD" <?= (old('pendidikan_terakhir') == 'SD') ? 'selected' : '' ?>>SD
                                    </option>
                                    <option value="SMP" <?= (old('pendidikan_terakhir') == 'SMP') ? 'selected' : '' ?>>
                                        SMP</option>
                                    <option value="SMA/K"
                                        <?= (old('pendidikan_terakhir') == 'SMA/K') ? 'selected' : '' ?>>SMA/K</option>
                                </select>
                            </div>


                            <div class="col-6 mb-3">
                                <label class="form-label">Asal Sekolah</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.asal_sekolah')) ? 'is-invalid' : '' ?>"
                                    name="asal_sekolah" placeholder="Masukkan Nomor Akta Lahir" required
                                    value="<?= old('asal_sekolah') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.asal_sekolah') ?>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="card-header" id="alamat">
                            <h4 class="card-title">Alamat</h4>
                        </div>
                        <div class="row mt-3" id="alamatRow">
                            <!-- <div class="col-12 mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <input type="text"
                                    class="form-control <= (session('errors.alamat')) ? 'is-invalid' : '' ?>"
                                    name="alamat" placeholder="Masukkan Alamat Lengkap" value="<= old('alamat') ?>">
                                <div class="invalid-feedback">
                                    <= session('errors.alamat') ?>
                                </div>
                            </div> -->

                            <div class="col-6 mb-3">
                                <label class="form-label">Provinsi</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.provinsi')) ? 'is-invalid' : '' ?>"
                                    name="provinsi" placeholder="Masukkan Provinsi" value="<?= old('provinsi') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.provinsi') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Kabupaten</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.kabupaten')) ? 'is-invalid' : '' ?>"
                                    name="kabupaten" placeholder="Masukkan Kabupaten" value="<?= old('kabupaten') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.kabupaten') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Kecamatan</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.kecamatan')) ? 'is-invalid' : '' ?>"
                                    name="kecamatan" placeholder="Masukkan Kecamatan" value="<?= old('kecamatan') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.kecamatan') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Kelurahan</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.kelurahan')) ? 'is-invalid' : '' ?>"
                                    name="kelurahan" placeholder="Masukkan Kelurahan" value="<?= old('kelurahan') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.kelurahan') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Kode Pos</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.kode_pos')) ? 'is-invalid' : '' ?>"
                                    name="kode_pos" placeholder="Masukkan Kode Pos" value="<?= old('kode_pos') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.kode_pos') ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control <?= (session('errors.alamat')) ? 'is-invalid' : '' ?>"
                                    name="alamat" placeholder="Masukkan Alamat Lengkap"><?= old('alamat') ?></textarea>
                                <div class="invalid-feedback">
                                    <?= session('errors.alamat') ?>
                                </div>
                            </div>

                        </div>

                        <!-- Orang Tua -->
                        <div class="card-header" id="orangTua">
                            <h4 class="card-title">Orang Tua</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 mb-3">
                                <label class="form-label">No KTP Orang Tua</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.ortu_no_ktp')) ? 'is-invalid' : '' ?>"
                                    name="ortu_no_ktp" placeholder="Masukkan No KTP Orang Tua (16 digit)"
                                    value="<?= old('ortu_no_ktp') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.ortu_no_ktp') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">No KK Orang Tua</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.ortu_no_kk')) ? 'is-invalid' : '' ?>"
                                    name="ortu_no_kk" placeholder="Masukkan No KK Orang Tua (16 digit)"
                                    value="<?= old('ortu_no_kk') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.ortu_no_kk') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.nama_ortu')) ? 'is-invalid' : '' ?>"
                                    name="nama_ortu" placeholder="Masukkan Nama Lengkap"
                                    value="<?= old('nama_ortu') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nama_ortu') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="tgl_lahir_ortu" class="form-label">Tanggal Lahir</label>
                                <!-- <input type="text" id="tgl_lahir_ortu" name="tgl_lahir_ortu" class="form-control"
                                    placeholder="Pilih Tanggal Lahir" required> -->
                                <input type="text" class="form-control" id="tgl_lahir_ortu" name="tgl_lahir_ortu"
                                    placeholder="Pilih tanggal" value="<?= old('tgl_lahir_ortu') ?>" required>
                            </div>

                            <div class="col-6 mb-3">
                                <div class="form-label">Jenis Kelamin</div>
                                <select class="form-select" name="jk_ortu">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="L" <?= (old('jk_ortu') == 'L') ? 'selected' : '' ?>>Laki-Laki
                                    </option>
                                    <option value="P" <?= (old('jk_ortu') == 'P') ? 'selected' : '' ?>>Perempuan
                                    </option>
                                </select>
                            </div>

                            <div class="col-6 mb-3">
                                <div class="form-label">Jenjang</div>
                                <select class="form-select" name="jenjang_asal_ortu" required>
                                    <option value="" selected disabled>Pilih Jenjang</option>
                                    <option value="TK" <?= (old('jenjang_asal_ortu') == 'TK') ? 'selected' : '' ?>>TK
                                    </option>
                                    <option value="SD" <?= (old('jenjang_asal_ortu') == 'SD') ? 'selected' : '' ?>>SD
                                    </option>
                                    <option value="SMP" <?= (old('jenjang_asal_ortu') == 'SMP') ? 'selected' : '' ?>>SMP
                                    </option>
                                    <option value="SMA/K"
                                        <?= (old('jenjang_asal_ortu') == 'SMA/K') ? 'selected' : '' ?>>SMA/K</option>
                                    <option value="S1" <?= (old('jenjang_asal_ortu') == 'S1') ? 'selected' : '' ?>>S1
                                    </option>
                                    <option value="S2" <?= (old('jenjang_asal_ortu') == 'S2') ? 'selected' : '' ?>>S2
                                    </option>
                                    <option value="S3" <?= (old('jenjang_asal_ortu') == 'S3') ? 'selected' : '' ?>>S3
                                    </option>
                                </select>
                            </div>


                            <div class="col-6 mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.no_hp')) ? 'is-invalid' : '' ?>"
                                    name="no_hp_ortu" placeholder="Masukkan Nomor HP" required
                                    value="<?= old('no_hp_ortu') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_hp') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.pekerjaan_ortu')) ? 'is-invalid' : '' ?>"
                                    name="pekerjaan_ortu" placeholder="Masukkan Pekerja"
                                    value="<?= old('pekerjaan_ortu') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.pekerjaan_ortu') ?>
                                </div>
                            </div>


                            <div class="col-6 mb-3">
                                <div class="form-label">Rentang Gaji</div>
                                <select class="form-select" name="rentang_gaji_ortu" required>
                                    <option value="" selected disabled>Pilih Rentang Gaji</option>
                                    <option value="1 juta - 5 juta"
                                        <?= (old('rentang_gaji_ortu') == '1 juta - 5 juta') ? 'selected' : '' ?>>1 juta
                                        - 5 juta</option>
                                    <option value="5 juta - 10 juta"
                                        <?= (old('rentang_gaji_ortu') == '5 juta - 10 juta') ? 'selected' : '' ?>>5 juta
                                        - 10 juta</option>
                                    <option value="10 juta - 15 juta"
                                        <?= (old('rentang_gaji_ortu') == '10 juta - 15 juta') ? 'selected' : '' ?>>10
                                        juta - 15 juta</option>
                                    <option value="15 juta - 20 juta"
                                        <?= (old('rentang_gaji_ortu') == '15 juta - 20 juta') ? 'selected' : '' ?>>15
                                        juta - 20 juta</option>
                                </select>
                            </div>


                        </div>

                        <!-- Wali Siswa -->
                        <div class="card-header" id="waliSiswa">
                            <h4 class="card-title">Wali Siswa</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 mb-3">
                                <label class="form-label">No KTP Wali</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.wali_no_ktp')) ? 'is-invalid' : '' ?>"
                                    name="wali_no_ktp" placeholder="Masukkan No KTP Wali (16 digit)"
                                    value="<?= old('wali_no_ktp') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.wali_no_ktp') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">No KK Wali</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.wali_no_kk')) ? 'is-invalid' : '' ?>"
                                    name="wali_no_kk" placeholder="Masukkan No KK Wali (16 digit)"
                                    value="<?= old('wali_no_kk') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.wali_no_kk') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Nama Wali</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.wali_nama')) ? 'is-invalid' : '' ?>"
                                    name="wali_nama" placeholder="Masukkan Nama Lengkap Wali"
                                    value="<?= old('wali_nama') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.wali_nama') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="tgl_lahir_wali" class="form-label">Tanggal Lahir</label>
                                <!-- <input type="text" id="tgl_lahir_ortu" name="tgl_lahir_ortu" class="form-control"
                                    placeholder="Pilih Tanggal Lahir" required> -->
                                <input type="text" class="form-control" id="tgl_lahir_wali" name="tgl_lahir_wali"
                                    placeholder="Pilih tanggal" value="<?= old('tgl_lahir_wali') ?>">
                            </div>

                            <div class="col-6 mb-3">
                                <div class="form-label">Jenis Kelamin</div>
                                <select class="form-select" name="jk_wali">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="L" <?= (old('jk_wali') == 'L') ? 'selected' : '' ?>>Laki-Laki
                                    </option>
                                    <option value="P" <?= (old('jk_wali') == 'P') ? 'selected' : '' ?>>Perempuan
                                    </option>
                                </select>
                            </div>

                            <div class="col-6 mb-3">
                                <div class="form-label">Jenjang</div>
                                <select class="form-select" name="jenjang_asal_wali">
                                    <option value="" selected disabled>Pilih Jenjang</option>
                                    <option value="TK" <?= (old('jenjang_asal_wali') == 'TK') ? 'selected' : '' ?>>TK
                                    </option>
                                    <option value="SD" <?= (old('jenjang_asal_wali') == 'SD') ? 'selected' : '' ?>>SD
                                    </option>
                                    <option value="SMP" <?= (old('jenjang_asal_wali') == 'SMP') ? 'selected' : '' ?>>SMP
                                    </option>
                                    <option value="SMA/K"
                                        <?= (old('jenjang_asal_wali') == 'SMA/K') ? 'selected' : '' ?>>SMA/K</option>
                                    <option value="S1" <?= (old('jenjang_asal_wali') == 'S1') ? 'selected' : '' ?>>S1
                                    </option>
                                    <option value="S2" <?= (old('jenjang_asal_wali') == 'S2') ? 'selected' : '' ?>>S2
                                    </option>
                                    <option value="S3" <?= (old('jenjang_asal_wali') == 'S3') ? 'selected' : '' ?>>S3
                                    </option>
                                </select>
                            </div>


                            <div class="col-6 mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.no_hp')) ? 'is-invalid' : '' ?>"
                                    name="no_hp_wali" placeholder="Masukkan Nomor HP" value="<?= old('no_hp_wali') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_hp') ?>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text"
                                    class="form-control <?= (session('errors.pekerjaan_wali')) ? 'is-invalid' : '' ?>"
                                    name="pekerjaan_wali" placeholder="Masukkan Pekerja"
                                    value="<?= old('pekerjaan_wali') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.pekerjaan_wali') ?>
                                </div>
                            </div>


                            <div class="col-6 mb-3">
                                <div class="form-label">Rentang Gaji</div>
                                <select class="form-select" name="rentang_gaji_wali">
                                    <option value="" selected disabled>Pilih Rentang Gaji</option>
                                    <option value="1 juta - 5 juta"
                                        <?= (old('rentang_gaji_wali') == '1 juta - 5 juta') ? 'selected' : '' ?>>1 juta
                                        - 5 juta</option>
                                    <option value="5 juta - 10 juta"
                                        <?= (old('rentang_gaji_wali') == '5 juta - 10 juta') ? 'selected' : '' ?>>5 juta
                                        - 10 juta</option>
                                    <option value="10 juta - 15 juta"
                                        <?= (old('rentang_gaji_wali') == '10 juta - 15 juta') ? 'selected' : '' ?>>10
                                        juta - 15 juta</option>
                                    <option value="15 juta - 20 juta"
                                        <?= (old('rentang_gaji_wali') == '15 juta - 20 juta') ? 'selected' : '' ?>>15
                                        juta - 20 juta</option>
                                </select>
                            </div>
                        </div>

                        <!-- Wali Siswa -->
                        <div class="card-header" id="uploadFile">
                            <h4 class="card-title">Upload File</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 mb-3">
                                <div class="form-label">Pass Foto 4x6</div>
                                <input type="file" name="foto"
                                    class="form-control <?= session('errors.foto') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.foto')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.foto') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">Akta Kelahiran</div>
                                <input type="file" name="akta_kelahiran"
                                    class="form-control <?= session('errors.akta_kelahiran') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.akta_kelahiran')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.akta_kelahiran') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">Kartu Keluarga</div>
                                <input type="file" name="kartu_keluarga"
                                    class="form-control <?= session('errors.kartu_keluarga') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.kartu_keluarga')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.kartu_keluarga') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">Ijazah Sekolah</div>
                                <input type="file" name="ijazah"
                                    class="form-control <?= session('errors.ijazah') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.ijazah')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.ijazah') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">Kartu NISN</div>
                                <input type="file" name="kartu_nisn"
                                    class="form-control <?= session('errors.kartu_nisn') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.kartu_nisn')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.kartu_nisn') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">Raport Semester 1 s.d 5</div>
                                <input type="file" name="raport"
                                    class="form-control <?= session('errors.raport') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.raport')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.raport') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">Fotocopy KIP</div>
                                <input type="file" name="kip"
                                    class="form-control <?= session('errors.kip') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.kip')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.kip') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">KTP Orang Tua</div>
                                <input type="file" name="ktp_ortu"
                                    class="form-control <?= session('errors.ktp_ortu') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.ktp_ortu')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.ktp_ortu') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="form-label">
                                    Fotocopy Akte Kematian Orang Tua <span class="text-danger">*</span>
                                    <small class="form-text text-muted">Khusus Siswa Yatim/Piatu/Yatim dan Piatu</small>
                                </div>
                                <input type="file" name="akte_kematian"
                                    class="form-control <?= session('errors.akte_kematian') ? 'is-invalid' : '' ?>" />
                                <?php if (session('errors.akte_kematian')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.akte_kematian') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#confirmationModal">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda sudah yakin dengan data yang Anda masukkan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="dataForm">Ya, Simpan</button>
                </div>
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


    document.addEventListener("DOMContentLoaded", function() {
        // Pilih semua input file di dalam form
        const fileInputs = document.querySelectorAll('input[type="file"]');

        // Iterasi setiap input file
        fileInputs.forEach(input => {
            input.addEventListener('change', function(event) {
                const files = event.target.files; // Ambil file yang diunggah
                if (files.length > 0) {
                    const file = files[0]; // Ambil file pertama
                    console.log(`File Name: ${file.name}`); // Nama file
                    console.log(`File Size: ${file.size} bytes`); // Ukuran file
                    console.log(`File Type: ${file.type}`); // Tipe file

                    // Menampilkan nama file di bawah input (opsional)
                    const fileInfo = document.createElement('div');
                    fileInfo.classList.add('text-muted', 'mt-1');
                    fileInfo.textContent = `File Terpilih: ${file.name}`;

                    // Hapus info sebelumnya jika ada
                    const existingInfo = this.nextElementSibling;
                    if (existingInfo && existingInfo.classList.contains('text-muted')) {
                        existingInfo.remove();
                    }

                    // Tambahkan info baru setelah input
                    this.insertAdjacentElement('afterend', fileInfo);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>