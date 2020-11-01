<?php

namespace App\Controllers;

use App\Models\RestModel;

class Rest extends BaseController
{
    protected $RestModel;

    public function __construct()
    {
        $this->RestModel = new RestModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Rest Client',
            'mahasiswa' => $this->RestModel->getAllMahasiswa(),
        ];
        return view('/Rest/index', $data);
    }

    public function hapus($id)
    {

        $this->RestModel->hapusMahasiswa($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/Rest/index');
    }

    public function simpan()
    {
        $nrp = $this->request->getVar('nrp');
        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $jurusan = $this->request->getVar('jurusan');
        $this->RestModel->simpanMahasiswa($nrp, $nama, $email, $jurusan);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('/Rest/index');
    }

    public function ubah($id)
    {
        $nrp = $this->request->getVar('nrp');
        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $jurusan = $this->request->getVar('jurusan');
        $this->RestModel->ubahMahasiswa($id, $nrp, $nama, $email, $jurusan);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/Rest/index');
    }
}
