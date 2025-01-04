<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class calonSiswaModel extends Model
{
    protected $table = 'calon_siswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_sekolah', 'no_pendaftaran', 'nis', 'nisn', 'nik', 'no_kk', 'no_akta_lahir', 'nama', 'tmpt_lahir', 'jk', 'tinggi_badan', 'berat_badan', 'anak_ke', 'jml_saudara', 'agama', 'no_hp', 'email', 'pendidikan_terakhir', 'asal_sekolah'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
