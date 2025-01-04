<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class calonSiswaOrtuModel extends Model
{
    protected $table = 'calon_siswa_ortu';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_calon_siswa', 'ortu_no_ktp', 'ortu_no_kk', 'nama_ortu', 'tgl_lahir_ortu', 'jk_ortu', 'jenjang_asal_ortu', 'no_hp_ortu', 'pekerjaan_ortu', 'rentang_gaji_ortu'];
    protected $useTimestamps = true;
}
