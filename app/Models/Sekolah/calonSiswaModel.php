<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class calonSiswaModel extends Model
{
    protected $table = 'calon_siswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_sekolah', 'id_user', 'id_gelombang', 'no_pendaftaran', 'nis', 'nisn', 'nik', 'no_kk', 'no_akta_lahir', 'nama', 'tanggal_lahir', 'tmpt_lahir', 'jk', 'tinggi_badan', 'berat_badan', 'anak_ke', 'jml_saudara', 'agama', 'no_hp', 'email', 'pendidikan_terakhir', 'asal_sekolah'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getCalonSiswaWithSekolah($perPage = 1, $group = 'default')
    {
        return $this->select('calon_siswa.id, calon_siswa.nama, calon_siswa.nisn, calon_siswa.tmpt_lahir, calon_siswa.tanggal_lahir, calon_siswa.jk, ms_sekolah.nama as sekolah')
            ->join('ms_sekolah', 'ms_sekolah.id = calon_siswa.id_sekolah', 'left')
            ->paginate($perPage, $group);
    }


    public function countSekolahById($idSekolah)
    {
        return $this->where('id_sekolah', $idSekolah)->countAllResults();
    }
}
