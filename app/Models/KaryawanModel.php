<?php

namespace App\Models;
use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = ['nama_karyawan', 'alternatif'];

    public function searchKaryawan($keyword)
    {
        return $this->like('nama_karyawan', $keyword)->findAll();
    }

    public function getAllKaryawan()
    {
        return $this->findAll();
    }

    public function getKaryawanById($id)
    {
        return $this->where('id_karyawan', $id)->first();
    }

    public function updateKaryawan($id, $data)
    {
        return $this->update($id, $data);
    }
}
