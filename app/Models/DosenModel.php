<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $allowedFields = ['foto', 'name', 'NIK', 'email', 'department', 'lecture_expertise', 'link_sinta'];

    public function getDosen($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_dosen' => $id])->first();
    }

    public function getPublication($id)
    {
        return $this->db->table('dosen')
            ->join('publication', 'publication.id_dosen = dosen.id_dosen')
            ->where(['publication.id_dosen' => $id])
            ->get()->getResultArray();
    }
}
