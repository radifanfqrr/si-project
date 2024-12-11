<?php
namespace App\Controllers;
use App\Models\PenilaianModel;
use App\Models\KriteriaModel;
use App\Models\KaryawanModel;

class penilaianController extends BaseController
{
    public function index()
    {
        $penilaianModel = new PenilaianModel();
        $data['penilaian'] = $penilaianModel->findAll();
        return view('viewPenilaian', $data);
    }

    public function viewPenilaian()
    {
        $penilaianModel = new PenilaianModel();
        $kriteriaModel = new KriteriaModel();
        $karyawanModel = new KaryawanModel();
        $data['kriteria'] = $kriteriaModel->findAll();
        $data['karyawan'] = $karyawanModel->findAll();
        $penilaian = $penilaianModel->getPenilaianWithKriteria();
        $formattedPenilaian = [];
        foreach ($data['karyawan'] as $k) {
            $formattedPenilaian[$k['id_karyawan']] = [];
        }
        foreach ($penilaian as $p) {
            $formattedPenilaian[$p['ID_Karyawan']][$p['ID_Kriteria']] = $p['Nilai'];
        }
    
        $data['penilaian'] = $formattedPenilaian;
    
        echo view('adminHeader');
        echo view('adminNavbar');
        echo view('adminSidebar');
        echo view('viewPenilaian', $data);
        echo view('adminFooter');
    }
    public function createPenilaian()
    {
        $penilaianModel = new PenilaianModel();
        $data = [
            'id_karyawan' => $this->request->getPost('id_karyawan'),
            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'nilai' => $this->request->getPost('nilai')
        ];
        if ($penilaianModel->save($data)) {
            return redirect()->to(site_url('/penilaian/viewPenilaian'))->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data.');
        }
    }

    public function editPenilaian($idKaryawan, $idKriteria)
    {
        $penilaianModel = new PenilaianModel();
        $data = [
            'nilai' => $this->request->getPost('nilai'),
        ];
        $penilaianModel->where('id_karyawan', $idKaryawan)
            ->where('id_kriteria', $idKriteria)
            ->set($data)
            ->update();

        return redirect()->to(site_url('/penilaian/viewPenilaian'))->with('success', 'Data berhasil diperbarui.');
    }

    public function updateAllPenilaian()
    {
        $penilaianModel = new PenilaianModel();
        $idKaryawan = $this->request->getPost('id_karyawan');
        $nilaiArray = $this->request->getPost('nilai');
        foreach ($nilaiArray as $idKriteria => $nilai) {
            $penilaianModel->where('id_karyawan', $idKaryawan)
                ->where('id_kriteria', $idKriteria)
                ->set(['nilai' => $nilai])
                ->update();
        }

        return redirect()->to(site_url('/penilaian/viewPenilaian'))->with('success', 'Data penilaian berhasil diperbarui.');
    }

    public function deletePenilaian($idKaryawan, $idKriteria)
    {
        $penilaianModel = new PenilaianModel();
        $penilaianModel->where('id_karyawan', $idKaryawan)
                       ->where('id_kriteria', $idKriteria)
                       ->delete();
    
        return redirect()->to(site_url('/penilaian/viewPenilaian'))->with('success', 'Data penilaian berhasil dihapus.');
    }
}
