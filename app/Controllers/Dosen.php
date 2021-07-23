<?php

namespace App\Controllers;

use \App\Models\DosenModel;
use App\Models\PublicationModel;

class Dosen extends BaseController
{
    protected $dosenModel;
    protected $publicationModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        $this->publicationModel = new PublicationModel();
    }

    public function index()
    {
        // $dosen = $this->dosenModel->findAll();
        $data = [
            'dosen' => $this->dosenModel->getDosen()
        ];

        return view('admin/dosen/detail_data', $data);
    }

    public function tambah()
    {
        return view('admin/dosen/tambah_data');
    }

    public function edit($id)
    {
        $data = [
            'dosen' => $this->dosenModel->getDosen($id),
            'publication' => $this->dosenModel->getPublication($id)
        ];

        return view('admin/dosen/edit_data', $data);
    }

    public function simpan()
    {
        $this->dosenModel->save([
            'foto' => $this->request->getVar('foto'),
            'name' => $this->request->getVar('name'),
            'NIK' => $this->request->getVar('NIK'),
            'email' => $this->request->getVar('email'),
            'department' => $this->request->getVar('department'),
            'lecture_expertise' => $this->request->getVar('lecture_expertise'),
            'link_sinta' => $this->request->getVar('link_sinta')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/dosen');
    }

    public function hapus($id)
    {
        $this->dosenModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/dosen');
    }

    public function update($id)
    {
        $this->dosenModel->save([
            'id_dosen' => $id,
            'foto' => $this->request->getVar('foto'),
            'name' => $this->request->getVar('name'),
            'NIK' => $this->request->getVar('NIK'),
            'email' => $this->request->getVar('email'),
            'department' => $this->request->getVar('department'),
            'lecture_expertise' => $this->request->getVar('lecture_expertise'),
            'link_sinta' => $this->request->getVar('link_sinta')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        $data = [
            'dosen' => $this->dosenModel->getDosen($id),
            'publication' => $this->dosenModel->getPublication($id)
        ];


        return view('admin/dosen/edit_data', $data);
    }

    // ---- publication ----

    public function tambah_publication($id)
    {

        $this->publicationModel->save([
            'id_dosen' => $id,
            'title' => $this->request->getVar('title'),
            'link' => $this->request->getVar('link'),
            'authors' => $this->request->getVar('authors'),
            'publish_at' => $this->request->getVar('publish_at')
        ]);

        session()->setFlashdata('pesan', 'Publikasi berhasil ditambah');

        // return redirect()->to('/dosen');
        $data = [
            'dosen' => $this->dosenModel->getDosen($id),
            'publication' => $this->dosenModel->getPublication($id)
        ];


        return view('admin/dosen/edit_data', $data);
    }

    public function hapus_publikasi($id_publication, $id_dosen)
    {
        $this->publicationModel->delete($id_publication);
        session()->setFlashdata('pesan', 'Publikasi berhasil dihapus');

        // return redirect()->to('/dosen');

        $data = [
            'dosen' => $this->dosenModel->getDosen($id_dosen),
            'publication' => $this->dosenModel->getPublication($id_dosen)
        ];


        return view('admin/dosen/edit_data', $data);
    }

    public function edit_publikasi($id, $id_dosen)
    {
        $data = [
            'dosen' => $this->dosenModel->getDosen($id_dosen),
            'publication' => $this->dosenModel->getPublication($id_dosen),
            'publikasi' => $this->publicationModel->getPublikasi($id)
        ];

        return view('admin/dosen/edit_publication', $data);
    }

    public function update_publication($id_publication, $id_dosen)
    {
        $this->publicationModel->save([
            'id_publication' => $id_publication,
            'title' => $this->request->getVar('title'),
            'link' => $this->request->getVar('link'),
            'authors' => $this->request->getVar('authors'),
            'publish_at' => $this->request->getVar('publish_at'),
            'id_dosen' => $id_dosen
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        $data = [
            'dosen' => $this->dosenModel->getDosen($id_dosen),
            'publication' => $this->dosenModel->getPublication($id_dosen)
        ];


        return view('admin/dosen/edit_data', $data);
    }
}
