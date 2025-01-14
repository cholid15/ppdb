<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class gelombangModel extends Model
{
    protected $table      = 'ms_gelombang';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'kode', 'nama', 'tanggal_buka', 'tanggal_tutup', 'status'];
}
