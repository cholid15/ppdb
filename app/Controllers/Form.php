<?php

namespace App\Controllers;

use App\Models\Sekolah\sekolahModel;
use App\Models\Sekolah\calonSiswaModel;
use App\Models\Sekolah\calonSiswaAlamatModel;
use App\Models\Sekolah\calonSiswaOrtuModel;
use App\Models\Sekolah\calonSiswaWaliModel;




class Form extends BaseController
{
    protected $calonSiswaModel;
    protected $calonSiswaAlamatModel;
    protected $calonSiswaOrtuModel;
    protected $calonSiswaWaliModel;
    protected $sekolahModel;

    public function __construct()
    {
        $this->calonSiswaModel = new CalonSiswaModel();
        $this->calonSiswaAlamatModel = new CalonSiswaAlamatModel();
        $this->calonSiswaOrtuModel = new CalonSiswaOrtuModel();
        $this->calonSiswaWaliModel = new CalonSiswaWaliModel();
        $this->sekolahModel = new SekolahModel();
    }


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

        // Aturan validasi
        $rules = [
            // Validasi Biodata
            'no_pendaftaran' => [
                'rules' => 'required|is_unique[calon_siswa.no_pendaftaran]',
                'errors' => [
                    'required' => 'Nomor pendaftaran harus diisi',
                    'is_unique' => 'Nomor pendaftaran sudah terdaftar'
                ]
            ],
            'id_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sekolah harus dipilih'
                ]
            ],
            'nis' => [
                'rules' => 'required|is_unique[calon_siswa.nis]',
                'errors' => [
                    'required' => 'NIS harus diisi',
                    'is_unique' => 'NIS sudah terdaftar'
                ]
            ],
            'nisn' => [
                'rules' => 'required|is_unique[calon_siswa.nisn]',
                'errors' => [
                    'required' => 'NISN harus diisi',
                    'is_unique' => 'NISN sudah terdaftar'
                ]
            ],
            'nik' => [
                'rules' => 'required|exact_length[16]|is_unique[calon_siswa.nik]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'exact_length' => 'NIK harus 16 digit',
                    'is_unique' => 'NIK sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'min_length' => 'Nama minimal 3 karakter'
                ]
            ],
            'no_kk' => [
                'rules' => 'required|is_unique[calon_siswa.no_kk]',
                'errors' => [
                    'required' => 'NO KK harus diisi',
                    'is_unique' => 'NO KK sudah terdaftar'
                ]
            ],
            'no_akta_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NO Akta Lahir harus diisi',
                ]
            ],
            'tmpt_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'anak_ke' => 'required',
            'jml_saudara' => 'required',
            'agama' => 'required',
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.',
                ],
            ],
            'pendidikan_terakhir' => 'required',
            'asal_sekolah' => 'required',
            'no_hp' => 'required',

            // Validasi Alamat
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos' => 'required',

            // Validasi Orang Tua
            'ortu_no_ktp' => [
                'rules' => 'required|exact_length[16]',
                'errors' => [
                    'required' => 'No KTP Orang Tua harus diisi',
                    'exact_length' => 'No KTP harus 16 digit'
                ]
            ],
            'ortu_no_kk' => [
                'rules' => 'required|exact_length[16]',
                'errors' => [
                    'required' => 'No KK Orang Tua harus diisi',
                    'exact_length' => 'No KK harus 16 digit'
                ]
            ],
            'nama_ortu' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'min_length' => 'Nama minimal 3 karakter'
                ]
            ],
            'tgl_lahir_ortu' => 'required',
            'jk_ortu' => 'required',
            'jenjang_asal_ortu' => 'required',
            'no_hp_ortu' => 'required',
            'pekerjaan_ortu' => 'required',
            'rentang_gaji_ortu' => 'required',
        ];

        // Validasi Input
        if (!$this->validate($rules)) {
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
                'no_pendaftaran' => $this->request->getPost('no_pendaftaran'),
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

            // Insert Wali
            $waliResult = $this->calonSiswaWaliModel->insert([
                'id_calon_siswa' => $calonSiswaId,
                'wali_no_ktp' => $this->request->getPost('wali_no_ktp'),
                'wali_no_kk' => $this->request->getPost('wali_no_kk'),
                'wali_nama' => $this->request->getPost('wali_nama'),
                'tgl_lahir_wali' => $this->request->getPost('tgl_lahir_wali'),
                'jk_wali' => $this->request->getPost('jk_wali'),
                'jenjang_asal_wali' => $this->request->getPost('jenjang_asal_wali'),
                'no_hp_wali' => $this->request->getPost('no_hp_wali'),
                'pekerjaan_wali' => $this->request->getPost('pekerjaan_wali'),
                'rentang_gaji_wali' => $this->request->getPost('rentang_gaji_wali'),
            ]);

            if (!$waliResult) {
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
