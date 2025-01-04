<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class calonSiswaWaliModel extends Model
{
    protected $table = 'calon_siswa_wali';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_calon_siswa', 'wali_no_ktp', 'wali_no_kk', 'wali_nama', 'tgl_lahir_wali', 'jk_wali', 'jenjang_asal_wali', 'no_hp_wali', 'pekerjaan_wali', 'rentang_gaji_wali'];
    protected $useTimestamps = true;
}
