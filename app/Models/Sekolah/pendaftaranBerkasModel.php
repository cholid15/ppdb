<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class pendaftaranBerkasModel extends Model
{
    protected $table = 'pendaftaran_berkas_cek';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_konfigurasi_gelombang',
        'id_calon_siswa',
        'id_berkas',
        'file',
        'status',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
