<?php

namespace App\Models\Sekolah;

use CodeIgniter\Model;

class msBerkasModel extends Model
{
    protected $table = 'ms_berkas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id',
        'nama',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
