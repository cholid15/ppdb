<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class konfigurasiGelombangModel extends Model
{
    protected $table      = 'konfigurasi_gelombang';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'id_gelombang', 'id_sekolah', 'kuota', 'biaya_pendaftaran'];


    public function getJoinedData()
    {
        return $this->db->table($this->table)
            ->select(
                'ms_gelombang.id as id_gelombang,
                ms_gelombang.nama as nama_gelombang,
            ms_sekolah.nama AS nama_sekolah,
            konfigurasi_gelombang.biaya_pendaftaran, 
            konfigurasi_gelombang.kuota, 
            ',
            )
            ->join('ms_sekolah', 'konfigurasi_gelombang.id_sekolah = ms_sekolah.id')
            ->join('ms_gelombang', 'konfigurasi_gelombang.id_gelombang = ms_gelombang.id')
            ->where('ms_gelombang.status', 'aktif') // Tambahkan kondisi ini
            ->get()
            ->getResultArray();
    }

    public function getJoinedDataById($id)
    {
        return $this->db->table($this->table)
            ->select(
                'ms_gelombang.id as id_gelombang,
            ms_gelombang.nama as nama_gelombang,
            ms_gelombang.kode as kode_gelombang,
            ms_sekolah.nama AS nama_sekolah, 
            ms_sekolah.alias as alias_sekolah,
            konfigurasi_gelombang.biaya_pendaftaran,
            ms_gelombang.tanggal_buka,
            ms_gelombang.tanggal_tutup, 
            konfigurasi_gelombang.kuota'
            )
            ->join('ms_sekolah', 'konfigurasi_gelombang.id_sekolah = ms_sekolah.id')
            ->join('ms_gelombang', 'konfigurasi_gelombang.id_gelombang = ms_gelombang.id')
            // ->join('calon_siswa', 'calon_siswa.id_gelombang = konfigurasi_gelombang.id_gelombang')
            ->where('ms_gelombang.id', $id)
            ->get()
            ->getRowArray();
    }

    public function hitungSiswa($id)
    {
        // Menghitung jumlah siswa yang terdaftar berdasarkan id_gelombang
        $siswaCount = $this->db->table('calon_siswa')
            ->where('id_gelombang', $id)  // Kondisi berdasarkan id_gelombang
            ->countAllResults(); // Menghitung jumlah siswa yang terdaftar

        return $siswaCount;
    }
}
