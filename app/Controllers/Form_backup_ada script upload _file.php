<?php

namespace App\Controllers;

use App\Models\Sekolah\sekolahModel;
use App\Models\Sekolah\calonSiswaModel;
use App\Models\Sekolah\calonSiswaAlamatModel;
use App\Models\Sekolah\calonSiswaOrtuModel;
use App\Models\Sekolah\calonSiswaWaliModel;
use App\Models\Sekolah\calonSiswaFileModel;




class Form extends BaseController
{
    protected $calonSiswaModel;
    protected $calonSiswaAlamatModel;
    protected $calonSiswaOrtuModel;
    protected $calonSiswaWaliModel;
    protected $sekolahModel, $calonSiswaFileModel;

    public function __construct()
    {
        $this->calonSiswaModel = new CalonSiswaModel();
        $this->calonSiswaAlamatModel = new CalonSiswaAlamatModel();
        $this->calonSiswaOrtuModel = new CalonSiswaOrtuModel();
        $this->calonSiswaWaliModel = new CalonSiswaWaliModel();
        $this->calonSiswaFileModel = new CalonSiswaFileModel();
        $this->sekolahModel = new SekolahModel();
    }

    // daftar calon Siswa
    public function daftar(): string
    {
        $calonSiswa = $this->calonSiswaModel->getCalonSiswaWithSekolah();

        $data = [
            'title' => 'PPDB - SMA Sultan Agung 1',
            'sekolah' => $this->sekolahModel->findAll(),
            'calonSiswa' => $calonSiswa,
            'validation' => \Config\Services::validation(),
        ];

        return view(
            'Form/daftar',
            $data
        );
    }

    // detail calon siswa
    public function detail($id)
    {
        // Ambil data siswa
        $calonSiswa = $this->calonSiswaModel->find($id);
        // Ambil data alamat
        $alamat = $this->calonSiswaAlamatModel->where('id_calon_siswa', $id)->findAll();
        // Ambil data orang tua
        $ortu = $this->calonSiswaOrtuModel->where('id_calon_siswa', $id)->findAll();
        // Ambil data wali
        $wali = $this->calonSiswaWaliModel->where('id_calon_siswa', $id)->findAll();
        // Ambil data file
        $file = $this->calonSiswaFileModel->where('id_calon_siswa', $id)->findAll();
        // Ambil data sekolah
        $sekolah = $this->sekolahModel->find($calonSiswa['id_sekolah']);
        // Ambil semua data sekolah untuk dropdown
        $sekolahList = $this->sekolahModel->findAll();

        // Gabungkan semua data ke dalam $data
        $data = [
            'title' => 'PPDB - Detail',
            'calonSiswa' => $calonSiswa,
            'alamat' => $alamat,
            'ortu' => $ortu,
            'wali' => $wali,
            'file' => $file,
            'sekolah' => $sekolah,
            'sekolahList' => $sekolahList  // Tambahkan data list sekolah
        ];
        d($data);
        // Kirim data ke view
        return view('Form/detail', $data);
    }



    // tambah pendaftar
    public function index(): string
    {


        $data = [
            'title' => 'PPDB - SMA Sultan Agung 1',
            'sekolah' => $this->sekolahModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('Form/form', $data);
    }


    public function simpan()
    {
        // Tambahkan pengecekan method
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Method not allowed');
        }

        // Tambahkan logging awal
        log_message('info', 'Starting save process...');



        // Validasi Input
        if (!$this->validate('calonSiswa')) {
            log_message('warning', 'Validation failed: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Mulai Transaction
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Tambahkan logging untuk data yang akan disimpan
            log_message('info', 'Saving data with input: ' . json_encode($this->request->getPost()));

            // Insert Calon Siswa
            $calonSiswaId = $this->calonSiswaModel->insert([
                'id_sekolah' => $this->request->getPost('id_sekolah'),
                // 'no_pendaftaran' => $this->request->getPost('no_pendaftaran'),
                'nis' => $this->request->getPost('nis'),
                'nisn' => $this->request->getPost('nisn'),
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'no_kk' => $this->request->getPost('no_kk'),
                'no_akta_lahir' => $this->request->getPost('no_akta_lahir'),
                'tmpt_lahir' => $this->request->getPost('tmpt_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'jk' => $this->request->getPost('jk'),
                'tinggi_badan' => $this->request->getPost('tinggi_badan'),
                'berat_badan' => $this->request->getPost('berat_badan'),
                'anak_ke' => $this->request->getPost('anak_ke'),
                'jml_saudara' => $this->request->getPost('jml_saudara'),
                'agama' => $this->request->getPost('agama'),
                'email' => $this->request->getPost('email'),
                'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
                'asal_sekolah' => $this->request->getPost('asal_sekolah'),
                'no_hp' => $this->request->getPost('no_hp'),
            ]);

            if (!$calonSiswaId) {
                throw new \Exception('Gagal menyimpan data calon siswa');
            }

            log_message('info', 'Calon Siswa ID: ' . $calonSiswaId);

            // Insert Alamat
            $alamatResult = $this->calonSiswaAlamatModel->insert([
                'id_calon_siswa' => $calonSiswaId,
                'jenis' => 'utama',
                'provinsi' => $this->request->getPost('provinsi'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kelurahan' => $this->request->getPost('kelurahan'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'alamat' => $this->request->getPost('alamat'),

            ]);

            if (!$alamatResult) {
                throw new \Exception('Gagal menyimpan data alamat');
            }

            log_message('info', 'Alamat berhasil disimpan untuk Calon Siswa ID: ' . $calonSiswaId);

            // Insert Orang Tua
            $ortuResult = $this->calonSiswaOrtuModel->insert([
                'id_calon_siswa' => $calonSiswaId,
                'ortu_no_ktp' => $this->request->getPost('ortu_no_ktp'),
                'ortu_no_kk' => $this->request->getPost('ortu_no_kk'),
                'tgl_lahir_ortu' => $this->request->getPost('tgl_lahir_ortu'),
                'jk_ortu' => $this->request->getPost('jk_ortu'),
                'jenjang_asal_ortu' => $this->request->getPost('jenjang_asal_ortu'),
                'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
                'pekerjaan_ortu' => $this->request->getPost('pekerjaan_ortu'),
                'rentang_gaji_ortu' => $this->request->getPost('rentang_gaji_ortu'),
                'nama_ortu' => $this->request->getPost('nama_ortu'),
            ]);

            if (!$ortuResult) {
                throw new \Exception('Gagal menyimpan data orang tua');
            }

            log_message('info', 'Orang Tua berhasil disimpan untuk Calon Siswa ID: ' . $calonSiswaId);

            $waliResult = $this->calonSiswaWaliModel->insert([
                'id_calon_siswa' => $calonSiswaId,
                'wali_no_ktp' => $this->request->getPost('wali_no_ktp') ?: null,
                'wali_no_kk' => $this->request->getPost('wali_no_kk') ?: null,
                'wali_nama' => $this->request->getPost('wali_nama') ?: null,
                'tgl_lahir_wali' => $this->request->getPost('tgl_lahir_wali') ?: null,
                'jk_wali' => $this->request->getPost('jk_wali') ?: null,
                'jenjang_asal_wali' => $this->request->getPost('jenjang_asal_wali') ?: null,
                'no_hp_wali' => $this->request->getPost('no_hp_wali') ?: null,
                'pekerjaan_wali' => $this->request->getPost('pekerjaan_wali') ?: null,
                'rentang_gaji_wali' => $this->request->getPost('rentang_gaji_wali') ?: null,
            ]);

            if (!$waliResult) {
                throw new \Exception('Gagal menyimpan data wali');
            }

            // Proses Upload File
            $uploadedFiles = ['pass_foto', 'akta_kelahiran', 'kartu_keluarga', 'ijazah', 'kartu_nisn', 'raport', 'kip', 'ktp_ortu', 'akte_kematian'];
            $filePaths = [];


            foreach ($uploadedFiles as $fileInput) {
                $file = $this->request->getFile($fileInput);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $timestamp = date('YmdHis'); // Format: 20250111132159
                    $originalName = $file->getName();
                    $newName = $timestamp . '_' . $originalName;

                    // Path tujuan di dalam direktori public/uploads/calon_siswa/
                    $uploadPath = FCPATH . 'uploads/calon_siswa/';

                    // Pastikan direktori tujuan ada, jika belum, buat direktori
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }

                    // Pindahkan file ke path tujuan
                    $file->move($uploadPath, $newName);

                    // Simpan nama file ke array
                    $filePaths[$fileInput] = 'uploads/calon_siswa/' . $newName;
                } else {
                    // Jika file tidak ada atau tidak valid
                    $filePaths[$fileInput] = null;
                }
            }

            // Modifikasi bagian insert file
            $calonSiswaFile = $this->calonSiswaFileModel->insert([
                'id_calon_siswa' => $calonSiswaId,
                'pass_foto' => $filePaths['pass_foto'] ?? null,
                'akta_kelahiran' => $filePaths['akta_kelahiran'] ?? null,
                'kartu_keluarga' => $filePaths['kartu_keluarga'] ?? null,
                'ijazah' => $filePaths['ijazah'] ?? null,
                'nisn' => $filePaths['kartu_nisn'] ?? null,
                'raport' => $filePaths['raport'] ?? null,
                'kip' => $filePaths['kip'] ?? null,
                'ktp_ortu' => $filePaths['ktp_ortu'] ?? null,
                'akte_kematian' => $filePaths['akte_kematian'] ?? null,
            ]);

            if (!$calonSiswaFile) {
                throw new \Exception('Gagal menyimpan data wali');
            }

            log_message('info', 'Wali berhasil disimpan untuk Calon Siswa ID: ' . $calonSiswaId);


            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Gagal menyimpan data');
            }

            log_message('info', 'All data saved successfully');
            return redirect()->to('/form')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error saving data: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    // $data = [
    //     'calon_siswa' => [
    //         'id_sekolah' => $this->request->getPost('id_sekolah'),
    //         'no_pendaftaran' => $this->request->getPost('no_pendaftaran'),
    //         'nis' => $this->request->getPost('nis'),
    //         'nisn' => $this->request->getPost('nisn'),
    //         'nik' => $this->request->getPost('nik'),
    //         'nama' => $this->request->getPost('nama'),
    //         'no_kk' => $this->request->getPost('no_kk'),
    //         'no_akta_lahir' => $this->request->getPost('no_akta_lahir'),
    //         'tmpt_lahir' => $this->request->getPost('tmpt_lahir'),
    //         'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
    //         'jk' => $this->request->getPost('jk'),
    //         'tinggi_badan' => $this->request->getPost('tinggi_badan'),
    //         'berat_badan' => $this->request->getPost('berat_badan'),
    //         'anak_ke' => $this->request->getPost('anak_ke'),
    //         'jml_saudara' => $this->request->getPost('jml_saudara'),
    //         'agama' => $this->request->getPost('agama'),
    //         'email' => $this->request->getPost('email'),
    //         'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
    //         'asal_sekolah' => $this->request->getPost('asal_sekolah'),
    //         'no_hp' => $this->request->getPost('no_hp'),
    //     ],

    //     'alamat' => [
    //         'jenis' => 'utama',
    //         'provinsi' => $this->request->getPost('provinsi'),
    //         'kabupaten' => $this->request->getPost('kabupaten'),
    //         'kecamatan' => $this->request->getPost('kecamatan'),
    //         'kelurahan' => $this->request->getPost('kelurahan'),
    //         'kode_pos' => $this->request->getPost('kode_pos'),
    //     ],

    //     'orang_tua' => [
    //         'no_ktp_ortu' => $this->request->getPost('ortu_no_ktp'),
    //         'no_kk_ortu' => $this->request->getPost('ortu_no_kk'),
    //         'tgl_lahir_ortu' => $this->request->getPost('tgl_lahir_ortu'),
    //         'jk_ortu' => $this->request->getPost('jk_ortu'),
    //         'jenjang_asal_ortu' => $this->request->getPost('jenjang_asal_ortu'),
    //         'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
    //         'pekerjaan_ortu' => $this->request->getPost('pekerjaan_ortu'),
    //         'rentang_gaji_ortu' => $this->request->getPost('rentang_gaji_ortu'),
    //         'nama_ortu' => $this->request->getPost('nama_ortu'),
    //     ],

    //     'wali' => [
    //         'no_ktp_wali' => $this->request->getPost('wali_no_ktp'),
    //         'no_kk_wali' => $this->request->getPost('wali_no_kk'),
    //         'nama_wali' => $this->request->getPost('wali_nama'),
    //         'tgl_lahir_wali' => $this->request->getPost('tgl_lahir_wali'),
    //         'jk_wali' => $this->request->getPost('jk_wali'),
    //         'jenjang_asal_wali' => $this->request->getPost('jenjang_asal_wali'),
    //         'no_hp_wali' => $this->request->getPost('no_hp_wali'),
    //         'pekerjaan_wali' => $this->request->getPost('pekerjaan_wali'),
    //         'rentang_gaji_wali' => $this->request->getPost('rentang_gaji_wali'),
    //     ],
    // ];

    // dd($data);
}
