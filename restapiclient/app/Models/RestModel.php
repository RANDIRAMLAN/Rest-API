<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class RestModel extends Model
{
    protected $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/restapiserver/public/'
        ]);
    }
    public function getAllMahasiswa()
    {
        $response = $this->client->request('GET', 'mahasiswa');
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusMahasiswa($id)
    {
        $response = $this->client->request('DELETE', 'mahasiswa/' . $id);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function simpanMahasiswa($nrp, $nama, $email, $jurusan)
    {
        $response = $this->client->request('POST', 'mahasiswa', [
            'form_params' => [
                'nrp' => $nrp,
                'nama' => $nama,
                'email' => $email,
                'jurusan' => $jurusan
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function ubahMahasiswa($id, $nrp, $nama, $email, $jurusan)
    {
        $response = $this->client->request('PUT', 'mahasiswa/' . $id,  [
            'form_params' => [
                'nrp' => $nrp,
                'nama' => $nama,
                'email' => $email,
                'jurusan' => $jurusan
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}
