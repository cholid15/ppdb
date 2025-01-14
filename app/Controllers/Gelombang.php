<?php

namespace App\Controllers;

use App\Models\Sekolah\konfigurasiGelombangModel;
use App\Models\Sekolah\gelombangModel;
use App\Models\Sekolah\calonSiswaModel;
use App\Models\Sekolah\calonSiswaAlamatModel;
use App\Models\Sekolah\calonSiswaOrtuModel;
use App\Models\Sekolah\calonSiswaWaliModel;


use App\Models\Auth\authPermissionModel;

use Nim4n\SimpleDate;





class Gelombang extends BaseController
{
    protected $gelombang;
    protected $konfigurasiGelombangModel;
    protected $calonSiswaModel;
    protected $calonSiswaAlamatModel;
    protected $calonSiswaOrtuModel;
    protected $calonSiswaWaliModel, $authPermissionModel;

    public function __construct()
    {
        $this->gelombang = new gelombangModel();
        $this->konfigurasiGelombangModel = new konfigurasiGelombangModel();
        $this->calonSiswaModel = new CalonSiswaModel();
        $this->calonSiswaAlamatModel = new CalonSiswaAlamatModel();
        $this->calonSiswaOrtuModel = new CalonSiswaOrtuModel();
        $this->calonSiswaWaliModel = new CalonSiswaWaliModel();

        $this->authPermissionModel = new authPermissionModel();
    }


    public function satu(): string
    {


        $data = [
            'title' => 'PPDB - SMA Sultan Agung 1',
            'sekolah' => $this->gelombang->findAll(),
            'gelombang' => $this->konfigurasiGelombangModel->getJoinedData(),
            'validation' => \Config\Services::validation()
        ];

        // dd($data);
        return view('Form/gelombang', $data);
    }


    public function form_gelombang($id): string
    {
        // Ambil data berdasarkan id_gelombang
        $gelombangData = $this->konfigurasiGelombangModel->getJoinedDataById($id);

        // dd($gelombangData);


        if (!$gelombangData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Gelombang dengan ID $id tidak ditemukan.");
        }

        // Hitung jumlah siswa yang terdaftar
        $jumlahSiswa = $this->konfigurasiGelombangModel->hitungSiswa($id);

        $data = [
            'title' => 'PPDB - Form Pendaftaran',
            'gelombang' => $gelombangData,
            // 'validation' => \Config\Services::validation()
            'jumlah' => $jumlahSiswa,
        ];
        // dd($data);
        return view('Form/form_gelombang', $data);
    }


    public function simpan()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'           => 'required',
            'nisn'           => 'required|numeric',
            'tmpt_lahir'     => 'required',
            'tanggal_lahir'  => 'required|valid_date',
            'asal_sekolah'   => 'required',
            'no_hp'          => 'required|numeric',
            'email'          => 'required|valid_email',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        try {
            $db = \Config\Database::connect();
            $db->transStart();

            // Ambil id_gelombang dari form
            $idGelombang = $this->request->getPost('id_gelombang');

            // Ambil data gelombang untuk membuat password dan no_pendaftaran
            $gelombangData = $this->konfigurasiGelombangModel->getJoinedDataById($idGelombang);

            // Generate password dengan format yang diinginkan
            // REG(kode_gelombang)(alias_sekolah)NISN
            $password = sprintf(
                "REG%s%s%s",
                $gelombangData['kode_gelombang'],
                $gelombangData['alias_sekolah'],
                $this->request->getPost('nisn')
            );

            // Generate no_pendaftaran dengan format yang sama
            $noPendaftaran = sprintf(
                "REG%s%s%s",
                $gelombangData['kode_gelombang'],
                $gelombangData['alias_sekolah'],
                $this->request->getPost('nisn')
            );

            // Simpan data user ke CodeIgniter Shield
            $users = auth()->getProvider();
            $user = new \CodeIgniter\Shield\Entities\User([
                'username' => strtolower(str_replace(' ', '_', $this->request->getPost('nama'))),
                'email'    => $this->request->getPost('email'),
                'password' => $password,
            ]);
            $users->save($user);



            // Dapatkan ID user
            $userId = $users->getInsertID();

            // Simpan data ke tabel auth_permission_users
            $dataPermissionUser = [
                'user_id'    => $userId,
                'permission' => 'siswa',
                'created_at' => date('Y-m-d H:i:s')
            ];

            // dd($dataPermissionUser);

            try {
                $result = $this->authPermissionModel->insert($dataPermissionUser);
                log_message('info', 'Insert result: ' . json_encode($result));
                log_message('info', 'Last error: ' . json_encode($this->authPermissionModel->errors()));
            } catch (\Exception $e) {
                log_message('error', 'Failed to insert permission: ' . $e->getMessage());
                throw $e;
            }

            // Data calon siswa
            $dataCalonSiswa = [
                'id_user'       => $userId,
                'id_gelombang'  => $idGelombang,
                'nama'          => $this->request->getPost('nama'),
                'nisn'          => $this->request->getPost('nisn'),
                'tmpt_lahir'    => $this->request->getPost('tmpt_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'asal_sekolah'  => $this->request->getPost('asal_sekolah'),
                'no_hp'         => $this->request->getPost('no_hp'),
                'email'         => $this->request->getPost('email'),
                'no_pendaftaran' => $noPendaftaran, // Tambah field no_pendaftaran
            ];
            $this->calonSiswaModel->insert($dataCalonSiswa);
            $idCalonSiswa = $this->calonSiswaModel->getInsertID();


            $dataAlamat = [
                'id_calon_siswa' => $idCalonSiswa,
            ];
            $this->calonSiswaAlamatModel->insert($dataAlamat);

            $dataOrtu = [
                'id_calon_siswa' => $idCalonSiswa,
            ];
            $this->calonSiswaOrtuModel->insert($dataOrtu);

            $dataWali = [
                'id_calon_siswa' => $idCalonSiswa,
            ];
            $this->calonSiswaWaliModel->insert($dataWali);

            $emailConfig = new \Config\Email();
            $email = service('email');

            $emailData = [
                'no_pendaftaran' => $noPendaftaran,
                'email' => $this->request->getPost('email'),
                'nama' => $this->request->getPost('nama'),
                'sekolah' => $gelombangData['nama_sekolah']
            ];

            $email->setFrom($emailConfig->fromEmail, $emailConfig->fromName)
                ->setTo($this->request->getPost('email'))
                ->setSubject('Informasi Pendaftaran PPDB ' . $gelombangData['nama_sekolah'])
                ->setMessage(view('emails/registrasi', $emailData));


            // matikan sementara 
            $email->send(false);

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Gagal menyimpan data');
            }

            // Kirim password dan no_pendaftaran sebagai flash message
            return redirect()->back()->with('message', 'Data berhasil disimpan. Password anda adalah: ' . $password . ' dan Nomor Pendaftaran anda adalah: ' . $noPendaftaran);
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
