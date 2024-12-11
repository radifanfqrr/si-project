<?php

namespace App\Models;
use CodeIgniter\Model;

class penilaianModel extends Model
{
    protected $table = 'Penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $allowedFields = ['id_karyawan', 'id_kriteria', 'nilai'];
    

    public function getPenilaianWithKriteria()
    {
        return $this->select('penilaian.ID_Karyawan, penilaian.ID_Kriteria, penilaian.Nilai, kriteria.Nama_Kriteria, kriteria.Bobot, kriteria.Jenis_Kriteria')
            ->join('kriteria', 'penilaian.ID_Kriteria = kriteria.ID_Kriteria')
            ->findAll();
    }

    public function getPenilaianForKaryawan($idKaryawan)
    {
        return $this->where('ID_Karyawan', $idKaryawan)->findAll();
    }
}
