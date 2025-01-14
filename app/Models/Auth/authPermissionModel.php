<?php

namespace App\Models\Auth;

use CodeIgniter\Model;

class authPermissionModel extends Model
{
    protected $table = 'auth_permissions_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id', 'permission', 'created_at'];  // Tambahkan created_at ke allowedFields
    protected $useTimestamps = false;  // Matikan useTimestamps
}
