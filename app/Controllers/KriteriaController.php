<?php
namespace App\Controllers;

use App\Models\KriteriaModel;

class KriteriaController extends BaseController
{
    protected $kriteriaModel;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
    }

    public function viewKriteria()
    {
        $data['kriteria'] = $this->kriteriaModel->getAllKriteria();

        echo view('adminHeader');
        echo view('adminNavbar');
        echo view('adminSidebar');
        echo view('viewKriteria', $data);
        echo view('adminFooter');
    }
    public function create()
    {
        $data = [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'jenis_kriteria' => $this->request->getPost('jenis_kriteria')
        ];
    
        $this->kriteriaModel->save($data);
    
        return redirect()->to(site_url('kriteria/viewKriteria'))->with('success', 'Kriteria berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $data = [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'jenis_kriteria' => $this->request->getPost('jenis_kriteria'),
        ];

        $model = new KriteriaModel();
        if ($model->updateKriteria($id, $data)) {
            return redirect()->to(base_url('KriteriaController/viewKriteria')) ->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->to('/kriteria')->with('error', 'Data gagal diperbarui');
        }
    }

    public function delete($id)
    {
        $data = $this->kriteriaModel->find($id);

        if (!$data) {
            return redirect()->to('/kriteria/viewKriteria')->with('error', 'Data kriteria tidak ditemukan!');
        }

        $this->kriteriaModel->delete($id);
        return redirect()->to('/kriteria/viewKriteria')->with('success', 'Kriteria berhasil dihapus!');
    }
}
