<?php

namespace App\Models;
use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $allowedFields = ['nama_kriteria', 'bobot', 'jenis_kriteria'];
    public function getAllKriteria()
    {
        return $this->findAll();
    }
    public function updateKriteria($id, $data)
    {
        return $this->update($id, $data);
    }

}
