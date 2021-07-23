<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model
{
    protected $table = 'publication';
    protected $primaryKey = 'id_publication';
    protected $allowedFields = ['title', 'link', 'authors', 'publish_at', 'id_dosen'];

    public function getPublikasi($id)
    {
        // return $this->db->table('publication')
        //     ->join('dosen', 'publication.id_dosen = dosen.id_dosen')
        //     ->where(['publication.id_publication' => $id])
        //     ->get()->getResultArray();
        return $this->where(['id_publication' => $id])->first();
    }
}
