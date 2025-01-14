<?php

namespace App\Controllers;

use App\Models\Sekolah\konfigurasiGelombangModel;
use App\Models\Sekolah\gelombangModel;
use App\Models\Sekolah\calonSiswaModel;
use App\Models\Sekolah\calonSiswaAlamatModel;
use App\Models\Sekolah\calonSiswaOrtuModel;
use App\Models\Sekolah\calonSiswaWaliModel;
use Nim4n\SimpleDate;





class calonSiswa extends BaseController
{
    protected $gelombang;
    protected $konfigurasiGelombangModel;
    protected $calonSiswaModel;
    protected $calonSiswaAlamatModel;
    protected $calonSiswaOrtuModel;
    protected $calonSiswaWaliModel;

    public function __construct()
    {
        $this->gelombang = new gelombangModel();
        $this->konfigurasiGelombangModel = new konfigurasiGelombangModel();
        $this->calonSiswaModel = new CalonSiswaModel();
        $this->calonSiswaAlamatModel = new CalonSiswaAlamatModel();
        $this->calonSiswaOrtuModel = new CalonSiswaOrtuModel();
        $this->calonSiswaWaliModel = new CalonSiswaWaliModel();
    }


    public function calonSiswa()
    {
        helper(['form']);

        // Dapatkan id_user dari pengguna yang login
        $idUser = auth()->user()->id;
        dd($idUser);

        // Inisialisasi model
        $calonSiswaModel = new CalonSiswaModel();
        $calonSiswaAlamatModel = new CalonSiswaAlamatModel();
        $calonSiswaOrtuModel = new CalonSiswaOrtuModel();
        $calonSiswaWaliModel = new CalonSiswaWaliModel();

        // Ambil data dari database berdasarkan id_user
        $calonSiswa = $calonSiswaModel->where('id_user', $idUser)->first();
        $alamat = $calonSiswaAlamatModel->where('id_calon_siswa', $calonSiswa['id'])->findAll();
        $ortu = $calonSiswaOrtuModel->where('id_calon_siswa', $calonSiswa['id'])->findAll();
        $wali = $calonSiswaWaliModel->where('id_calon_siswa', $calonSiswa['id'])->findAll();

        // Kirim data ke view
        return view('calon_siswa', [
            'calonSiswa' => $calonSiswa,
            'alamat' => $alamat,
            'ortu' => $ortu,
            'wali' => $wali,
        ]);
    }
}
