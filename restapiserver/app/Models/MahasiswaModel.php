<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $allowedFields = ['nrp', 'nama', 'email', 'jurusan'];

    public function hapus($id)
    {
        return $this->where(['id' => $id])->delete();
    }
}
