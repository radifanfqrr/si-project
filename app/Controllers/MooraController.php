<?php
namespace App\Controllers;
use App\Models\MooraModel;

class MooraController extends BaseController
{
    public function viewNormalization()
    {
        $model = new \App\Models\MooraModel();
        $kriteriaModel = new \App\Models\KriteriaModel();
        $karyawanModel = new \App\Models\KaryawanModel();
    
        $normalizationData = $model->getNormalizedMatrix();
        $kriteria = $kriteriaModel->findAll();
        $karyawan = $karyawanModel->findAll();
    
        // Inisialisasi matriks normalisasi
        $normalizedMatrix = [];
    
        // Pastikan setiap karyawan memiliki array penampung nilai kriteria
        foreach ($karyawan as $kar) {
            $normalizedMatrix[$kar['id_karyawan']] = [];
        }
    
        // Isi nilai normalisasi yang tersedia berdasarkan hasil query
        foreach ($normalizationData as $row) {
            $normalizedMatrix[$row->ID_Karyawan][$row->ID_Kriteria] = $row->NormalizedValue;
        }
    
        $data['karyawan'] = $karyawan;
        $data['kriteria'] = $kriteria;
        $data['normalizedMatrix'] = $normalizedMatrix;
    
        echo view('adminHeader');
        echo view('adminNavbar');
        echo view('adminSidebar');
        echo view('viewNormalization', $data);
        echo view('adminFooter');
    }
    
    

    public function viewRanking()
    {
        $model = new MooraModel();
        $data['ranking'] = $model->calculatePreference();

        echo View('adminHeader');
        echo View('adminNavbar');
        echo view("adminSidebar");
        echo view('viewRanking', $data);
        echo View('adminFooter');
    }
}
