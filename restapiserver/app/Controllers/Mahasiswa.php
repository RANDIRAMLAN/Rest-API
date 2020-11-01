<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MahasiswaModel;

class Mahasiswa extends ResourceController
{
    use ResponseTrait;
    protected $MahasiswaModel;
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }
    // get all mahasiswa
    public function index()
    {
        $data = $this->MahasiswaModel->findAll();
        return $this->respond($data, 200);
    }
    // show mahasiswa
    public function show($id = null)
    {
        $data = $this->MahasiswaModel->where('id', $id)->first();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound('Data Dengan Nomor ' . $id . ' Tidak Ditemukan');
        }
    }
    // simpan data
    public function create()
    {
        $data = [
            'nrp' => $this->request->getVar('nrp'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'jurusan' =>  $this->request->getVar('jurusan')
        ];
        $this->MahasiswaModel->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Berhasil Disimpan'
            ]
        ];
        return $this->respondCreated($response);
    }
    // ubah data
    public function update($id = null)
    {
        $currentData = $this->MahasiswaModel->where('id', $id)->first();
        if ($currentData) {
            $json = $this->request->getJSON();
            if ($json) {
                $data = [
                    'nrp' => $json->nrp,
                    'nama' => $json->nama,
                    'email' => $json->email,
                    'jurusan' => $json->jurusan
                ];
            } else {
                $input = $this->request->getRawInput();
                $data = [
                    'nrp' => $input['nrp'],
                    'nama' => $input['nama'],
                    'email' => $input['email'],
                    'jurusan' => $input['jurusan']
                ];
            }
            $this->MahasiswaModel->update($id, $data);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data Berhasil DiUbah'
                ]
            ];
            return $this->respondUpdated($response);
        } else {
            return $this->failNotFound('Data Dengan Nomor ' . $id . ' Tidak Ditemukan');
        }
    }
    // hapus data
    public function delete($id = null)
    {
        $data = $this->MahasiswaModel->where('id', $id)->first();
        if ($data) {
            $this->MahasiswaModel->hapus($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data Berhasil Dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data Dengan Nomor ' . $id . ' Tidak Ditemukan');
        }
    }
}
