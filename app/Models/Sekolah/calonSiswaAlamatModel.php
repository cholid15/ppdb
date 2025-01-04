<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class calonSiswaAlamatModel extends Model
{
    protected $table = 'calon_siswa_alamat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_calon_siswa', 'jenis', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'alamat', 'kode_pos'];
    protected $useTimestamps = true;
}
