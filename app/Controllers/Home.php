<?php

namespace App\Controllers;

use App\Models\Auth\authPermissionModel;
use App\Models\Sekolah\sekolahModel;
use App\Models\Sekolah\calonSiswaModel;




class Home extends BaseController
{

    protected $authPermissionModel, $calonSiswaModel, $sekolahModel;

    public function __construct()
    {
        $this->calonSiswaModel = new CalonSiswaModel();
        $this->sekolahModel = new SekolahModel();
        $this->authPermissionModel = new authPermissionModel();
    }
    public function index(): string
    {

        $user = auth()->user();
        $userId = $user->id;
        d($userId);

        $tk1 = $this->calonSiswaModel->countSekolahById(1);
        $tk2 = $this->calonSiswaModel->countSekolahById(2);
        $tk4 = $this->calonSiswaModel->countSekolahById(3);
        $sd1 = $this->calonSiswaModel->countSekolahById(4);
        $sd2 = $this->calonSiswaModel->countSekolahById(5);
        $sd3 = $this->calonSiswaModel->countSekolahById(6);
        $smp1 = $this->calonSiswaModel->countSekolahById(7);
        $smp4 = $this->calonSiswaModel->countSekolahById(8);
        $sma1 = $this->calonSiswaModel->countSekolahById(9);
        $sma4 = $this->calonSiswaModel->countSekolahById(10);


        $data = [
            'title' => 'PPDB - SMA Sultan Agung 1',
            'tk1' => $tk1,
            'tk2' => $tk2,
            'tk4' => $tk4,
            'sd1' => $sd1,
            'sd2' => $sd2,
            'sd3' => $sd3,
            'smp1' => $smp1,
            'smp4' => $smp4,
            'sma1' => $sma1,
            'sma4' => $sma4,
        ];

        // dd($data);
        return view('statistik_info', $data);
    }


    public function afterLogin()
    {
        // Dapatkan ID pengguna yang sedang login

        $user = auth()->user();
        $userId = $user->id;
        // dd($userId);

        // Cek permission dari user yang login
        $userPermission = $this->authPermissionModel
            ->where('user_id', $userId)
            ->first();

        // dd($userPermission);

        // Cek apakah permission admin
        if ($userPermission && $userPermission['permission'] === 'admin') {
            // return redirect()->to('siswa/dashboard');
            return redirect()->to('/');
        } else {
            // return redirect()->to('admin/dashboard');
            return redirect()->to('/');
        }
    }


    // view after login for admin
    public function admin()
    {

        $user = auth()->user();
        $d = [
            'title' => 'Admin PPDB',
            'username' => $user->username
        ];
        return view('statistik_info', $d);
    }


    // view after login for siswa

    public function siswa()
    {
        // Dapatkan ID pengguna yang sedang login
        $user = auth()->user();
        // $userId = $user->id;
        // d($userId);

        $d = [
            'title' => 'PPDD Sultan Agung',
            'username' => $user->username
        ];
        return view('siswa/dashboard', $d);
    }
}
