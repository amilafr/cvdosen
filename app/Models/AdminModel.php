<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'email', 'password'];
    // protected $useTimestamps = true;
    // protected $updatedField = 'terakhir_on';

    public function getAdmin($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_admin' => $id])->first();
    }

    public function getLogin($username)
    {
        $builder = $this->db->table('admin');
        $builder->where('username', $username);
        $log = $builder->get()->getRow();
        return $log;
    }
}
