<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class KaryawanController extends BaseController
{
    protected $karyawanModel;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }
    public function viewKaryawan()
    {
        $data['karyawan'] = $this->karyawanModel->getAllKaryawan(); // Ambil semua data
        echo view('adminHeader');
        echo view('adminNavbar');
        echo view('adminSidebar');
        return view('viewKaryawan', $data);
    }

    public function create()
    {
        $data = [
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'alternatif' => $this->request->getPost('alternatif'),
        ];
        if (!$this->karyawanModel->save($data)) {
        }
    
        return redirect()->to(site_url('karyawan/viewKaryawan'))->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->karyawanModel->getKaryawanById($id);

        if (!$data) {
            return redirect()->to('/karyawan/viewKaryawan')->with('error', 'Data karyawan tidak ditemukan!');
        }

        if (
            $this->validate([
                'nama_karyawan' => 'required',
            ])
        ) {
            $this->karyawanModel->updateKaryawan($id, [
                'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            ]);

            return redirect()->to('/karyawan/viewKaryawan')->with('success', 'Data karyawan berhasil diubah!');
        }

        return redirect()->back()->with('error', 'Validasi gagal. Pastikan semua data diisi dengan benar.');
    }

    public function delete($id)
    {
        $data = $this->karyawanModel->getKaryawanById($id);

        if (!$data) {
            return redirect()->to('/karyawan/viewKaryawan')->with('error', 'Data karyawan tidak ditemukan!');
        }

        $this->karyawanModel->delete($id);
        return redirect()->to('/karyawan/viewKaryawan')->with('success', 'Data karyawan berhasil dihapus!');
    }
}
