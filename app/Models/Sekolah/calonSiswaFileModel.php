<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class calonSiswaFileModel extends Model
{
    protected $table = 'calon_siswa_file';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_calon_siswa',
        'pass_foto',
        'akta_kelahiran',
        'kartu_keluarga',
        'ijazah',
        'nisn',
        'raport',
        'kip',
        'ktp_ortu',
        'akte_kelahiran'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
