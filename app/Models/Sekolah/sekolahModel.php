<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class sekolahModel extends Model
{
    protected $table      = 'ms_sekolah';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama', 'alias'];
}
