<?php

namespace App\Models;

use CodeIgniter\Model;

class MooraModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function getNormalizedMatrix()
    {
        $query = $this->db->query("
            SELECT 
                p.ID_Karyawan, 
                p.ID_Kriteria, 
                p.Nilai / (SELECT SQRT(SUM(POW(Nilai, 2))) FROM penilaian WHERE ID_Kriteria = p.ID_Kriteria) AS NormalizedValue
            FROM penilaian p
        ");
        return $query->getResult();
    }
    
    public function calculatePreference()
    {
        $query = $this->db->query("
            SELECT 
                karyawan.ID_Karyawan, 
                karyawan.Nama_Karyawan, 
                SUM(CASE WHEN kriteria.Jenis_Kriteria = 'Benefit' THEN NormalizedValue * kriteria.Bobot ELSE 0 END) -
                SUM(CASE WHEN kriteria.Jenis_Kriteria = 'Cost' THEN NormalizedValue * kriteria.Bobot ELSE 0 END) AS PreferenceValue
            FROM (
                SELECT 
                    ID_Karyawan, 
                    ID_Kriteria, 
                    Nilai / (SELECT SQRT(SUM(POW(Nilai, 2))) FROM penilaian WHERE ID_Kriteria = p.ID_Kriteria) AS NormalizedValue
                FROM penilaian p
            ) AS Normalized
            JOIN kriteria ON Normalized.ID_Kriteria = kriteria.ID_Kriteria
            JOIN karyawan ON Normalized.ID_Karyawan = karyawan.ID_Karyawan
            GROUP BY karyawan.ID_Karyawan, karyawan.Nama_Karyawan
            ORDER BY PreferenceValue DESC
        ");
        return $query->getResult();
    }    
}