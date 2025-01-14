<?php

namespace App\Controllers;

use App\Models\Sekolah\sekolahModel;
use App\Models\Sekolah\calonSiswaModel;
use App\Models\Sekolah\calonSiswaAlamatModel;
use App\Models\Sekolah\calonSiswaOrtuModel;
use App\Models\Sekolah\calonSiswaWaliModel;
use App\Models\Sekolah\calonSiswaFileModel;
use App\Models\Sekolah\msBerkasModel;
use App\Models\Sekolah\pendaftaranBerkasModel;





class Form extends BaseController
{
    protected $calonSiswaModel;
    protected $calonSiswaAlamatModel;
    protected $calonSiswaOrtuModel;
    protected $calonSiswaWaliModel;
    protected $sekolahModel, $calonSiswaFileModel, $msBerkasModel,
        $pendaftaranBerkasModel;

    public function __construct()
    {

        $this->calonSiswaModel = new CalonSiswaModel();
        $this->calonSiswaAlamatModel = new CalonSiswaAlamatModel();
        $this->calonSiswaOrtuModel = new CalonSiswaOrtuModel();
        $this->calonSiswaWaliModel = new CalonSiswaWaliModel();
        $this->calonSiswaFileModel = new CalonSiswaFileModel();
        $this->msBerkasModel = new msBerkasModel();
        $this->pendaftaranBerkasModel = new pendaftaranBerkasModel();

        $this->sekolahModel = new SekolahModel();
    }


    // daftar calon Siswa
    public function daftar(): string
    {
        $perPage = 1;

        $calonSiswa = $this->calonSiswaModel->getCalonSiswaWithSekolah($perPage, 'calon_siswa');

        $data = [
            'title' => 'PPDB - SMA Sultan Agung 1',
            'sekolah' => $this->sekolahModel->findAll(),
            'calonSiswa' => $calonSiswa,
            'validation' => \Config\Services::validation(),
            'pager' => $this->calonSiswaModel->pager, // Kirim pager ke view
        ];

        return view('Form/daftar', $data);
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
        // $file = $this->calonSiswaFileModel->where('id_calon_siswa', $id)->findAll();
        // Ambil data sekolah
        $sekolah = $this->sekolahModel->find($calonSiswa['id_sekolah']);
        // Ambil semua data sekolah untuk dropdown
        $sekolahList = $this->sekolahModel->findAll();
        // Ambil data berkas berdasarkan id_calon_siswa
        $berkas = $this->pendaftaranBerkasModel->where('id_calon_siswa', $id)->findAll();

        // Map field id_berkas ke field view
        $berkasMapping = [
            1 => 'passfoto',
            2 => 'akta_kelahiran',
            3 => 'kk',
            4 => 'ijazah',
            5 => 'kartu_nisn',
            6 => 'raport',
            7 => 'kip',
            8 => 'ktp_ortu',
            9 => 'akte_kematian',
            10 => 'bukti_bayar',
        ];

        // Susun status berkas sesuai field
        $berkasStatus = [];
        foreach ($berkasMapping as $idBerkas => $field) {
            // Cari status berkas berdasarkan id_berkas
            $berkasData = array_filter($berkas, function ($item) use ($idBerkas) {
                return $item['id_berkas'] == $idBerkas;
            });

            $status = !empty($berkasData) ? reset($berkasData)['status'] : 'Tidak'; // Default 'Tidak' jika tidak ditemukan
            $berkasStatus[$field] = $status;
        }


        // Gabungkan semua data ke dalam $data
        $data = [
            'title' => 'PPDB - Detail',
            'calonSiswa' => $calonSiswa,
            'alamat' => $alamat,
            'ortu' => $ortu,
            'wali' => $wali,
            // 'file' => $file,
            'sekolah' => $sekolah,
            'sekolahList' => $sekolahList,  // Tambahkan data list sekolah
            'berkasStatus' => $berkasStatus,
        ];
        // d($data);
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


    // insert data
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


            // Array berkas dan nama field
            $daftarBerkas = [
                ['nama' => 'Pass Foto', 'field' => 'passfoto'],
                ['nama' => 'Akta Kelahiran', 'field' => 'akta_kelahiran'],
                ['nama' => 'Kartu Keluarga', 'field' => 'kk'],
                [
                    'nama' => 'Ijazah',
                    'field' => 'ijazah'
                ],
                [
                    'nama' => 'Kartu NISN',
                    'field' => 'kartu_nisn'
                ],
                ['nama' => 'Raport Semester 1 s.d 5', 'field' => 'raport'],
                ['nama' => 'Fotocopy KIP', 'field' => 'kip'],
                ['nama' => 'Fotocopy KTP Orang Tua', 'field' => 'ktp_ortu'],
                ['nama' => 'Fotocopy Akte Kematian Orang Tua', 'field' => 'akte_kematian'],
                ['nama' => 'Bukti Pembayaran', 'field' => 'bukti_bayar']
            ];

            // Simpan status berkas ke pendaftaran_berkas_cek
            foreach ($daftarBerkas as $berkas) {
                // Hanya cek berkas yang sudah ada
                $existingBerkas = $this->msBerkasModel->where('nama', $berkas['nama'])->first();

                // Periksa jika $existingBerkas tidak null dan memiliki data
                if ($existingBerkas !== null && isset($existingBerkas['id'])) {
                    // Simpan ke pendaftaran_berkas_cek
                    $this->pendaftaranBerkasModel->insert([
                        'id_konfigurasi_gelombang' => 1, // Sesuaikan dengan kebutuhan
                        'id_calon_siswa' => $calonSiswaId,
                        'id_berkas' => $existingBerkas['id'],
                        'status' => $this->request->getPost($berkas['field']),
                        'file' => null // Bisa ditambahkan nanti untuk upload file
                    ]);
                } else {
                    // Jika $existingBerkas tidak ditemukan, log atau tangani error
                    log_message('error', 'Berkas ' . $berkas['nama'] . ' tidak ditemukan.');
                }
            }



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

    // update data
    public function update($id)
    {
        // Tambahkan pengecekan method
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Method not allowed');
        }

        // Tambahkan logging awal
        log_message('info', 'Starting update process for ID: ' . $id);

        // Validasi Input
        if (!$this->validate('calonSiswaUpdate')) {
            log_message('warning', 'Validation failed: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Mulai Transaction
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Tambahkan logging untuk data yang akan diupdate
            log_message('info', 'Updating data with input: ' . json_encode($this->request->getPost()));

            // Update Calon Siswa
            $updateCalonSiswa = $this->calonSiswaModel->update($id, [
                'id_sekolah' => $this->request->getPost('id_sekolah'),
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

            if (!$updateCalonSiswa) {
                throw new \Exception('Gagal mengupdate data calon siswa');
            }

            // Update Alamat
            $alamatId = $this->calonSiswaAlamatModel->where('id_calon_siswa', $id)->first()['id'];
            $updateAlamat = $this->calonSiswaAlamatModel->update($alamatId, [
                'provinsi' => $this->request->getPost('provinsi'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kelurahan' => $this->request->getPost('kelurahan'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'alamat' => $this->request->getPost('alamat'),
            ]);

            if (!$updateAlamat) {
                throw new \Exception('Gagal mengupdate data alamat');
            }

            // Update Orang Tua
            $ortuId = $this->calonSiswaOrtuModel->where('id_calon_siswa', $id)->first()['id'];
            $updateOrtu = $this->calonSiswaOrtuModel->update($ortuId, [
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

            if (!$updateOrtu) {
                throw new \Exception('Gagal mengupdate data orang tua');
            }

            // Update Wali
            $waliId = $this->calonSiswaWaliModel->where('id_calon_siswa', $id)->first()['id'];
            $updateWali = $this->calonSiswaWaliModel->update($waliId, [
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

            if (!$updateWali) {
                throw new \Exception('Gagal mengupdate data wali');
            }

            // Update Berkas
            $daftarBerkas = [
                ['nama' => 'Pass Foto', 'field' => 'passfoto'],
                ['nama' => 'Akta Kelahiran', 'field' => 'akta_kelahiran'],
                ['nama' => 'Kartu Keluarga', 'field' => 'kk'],
                ['nama' => 'Ijazah', 'field' => 'ijazah'],
                ['nama' => 'Kartu NISN', 'field' => 'kartu_nisn'],
                ['nama' => 'Raport Semester 1 s.d 5', 'field' => 'raport'],
                ['nama' => 'Fotocopy KIP', 'field' => 'kip'],
                ['nama' => 'Fotocopy KTP Orang Tua', 'field' => 'ktp_ortu'],
                ['nama' => 'Fotocopy Akte Kematian Orang Tua', 'field' => 'akte_kematian'],
                ['nama' => 'Bukti Pembayaran', 'field' => 'bukti_bayar']
            ];

            foreach ($daftarBerkas as $berkas) {
                // Cari id_berkas berdasarkan nama di msBerkasModel
                $berkasId = $this->msBerkasModel->where('nama', $berkas['nama'])->first();

                if ($berkasId) {
                    // Cari record berkas yang sudah ada di pendaftaranBerkasModel
                    $berkasExisting = $this->pendaftaranBerkasModel
                        ->where('id_calon_siswa', $id)
                        ->where('id_berkas', $berkasId['id'])
                        ->first();

                    if ($berkasExisting) {
                        // Update status berkas
                        $this->pendaftaranBerkasModel->update($berkasExisting['id'], [
                            'status' => $this->request->getPost($berkas['field'])
                        ]);
                    }
                }
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Gagal mengupdate data');
            }

            log_message('info', 'All data updated successfully');
            return redirect()->back()->with('success', 'Status berkas berhasil diperbarui.');
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error updating data: ' . $e->getMessage());
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
