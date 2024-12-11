<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penilaian</title>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/custom.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="content-wrapper p-3">
        <div class="content-header mb-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Penilaian</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('Home/index'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Data Penilaian</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Penilaian -->
        <div class="mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Penilaian</button>
        </div>

        <!-- Modal Tambah Penilaian -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <form action="<?= site_url('/penilaian/createPenilaian') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahLabel">Tambah Penilaian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_karyawan" class="form-label">ID Karyawan</label>
                                <input type="text" id="id_karyawan" name="id_karyawan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_kriteria" class="form-label">ID Kriteria</label>
                                <input type="text" id="id_kriteria" name="id_kriteria" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nilai" class="form-label">Nilai</label>
                                <input type="number" id="nilai" name="nilai" class="form-control" min="0" max="100" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit ALL Penilaian -->
        <div class="modal fade" id="modalEditAll" tabindex="-1" aria-labelledby="modalEditAllLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <form id="formEditPenilaianAll" method="post" action="<?= site_url('/penilaian/updateAllPenilaian') ?>">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditAllLabel">Edit Penilaian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_karyawan" id="edit_all_id_karyawan">
                            <?php foreach ($kriteria as $k): ?>
                                <div class="mb-3">
                                    <label for="edit_nilai_<?= $k['id_kriteria'] ?>" class="form-label"><?= esc($k['nama_kriteria']) ?> (<?= esc($k['id_kriteria']) ?>)</label>
                                    <input type="number" class="form-control" name="nilai[<?= $k['id_kriteria'] ?>]" id="edit_nilai_<?= $k['id_kriteria'] ?>" min="0" max="100">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="text-end mb-3 me-3">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Delete Penilaian -->
        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <!-- Form Delete menggunakan GET sesuai route -->
                    <form id="formDeletePenilaian" method="get">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteLabel">Hapus Penilaian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_karyawan" id="delete_id_karyawan">
                            <div class="mb-3">
                                <label for="delete_id_kriteria" class="form-label">Pilih Kriteria yang ingin dihapus</label>
                                <select class="form-select" id="delete_id_kriteria">
                                    <!-- Akan diisi secara dinamis via JavaScript -->
                                </select>
                            </div>
                            <p>Yakin ingin menghapus nilai penilaian ini?</p>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Penilaian -->
        <div class="card shadow-sm">
            <div class="card-header">
                Tabel Data Penilaian
            </div>
            <div class="card-body p-3">
                <?php if (!empty($penilaian) && !empty($kriteria)): ?>
                    <div class="table-responsive">
                    <table class="table table-hover align-middle text-black">
                            <thead>
                                <tr>
                                    <th>ID Karyawan</th>
                                    <?php foreach ($kriteria as $k): ?>
                                        <th><?= esc($k['nama_kriteria']) ?> (<?= esc($k['id_kriteria']) ?>)</th>
                                    <?php endforeach; ?>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penilaian as $idKaryawan => $nilaiKriteria): ?>
                                    <tr>
                                        <td><?= esc($idKaryawan); ?></td>
                                        <?php foreach ($kriteria as $k): ?>
                                            <td>
                                                <?= isset($nilaiKriteria[$k['id_kriteria']]) ? esc($nilaiKriteria[$k['id_kriteria']]) : '-'; ?>
                                            </td>
                                        <?php endforeach; ?>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEditAll"
                                                onclick="fillEditFormAll('<?= esc($idKaryawan); ?>')">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                                onclick="fillDeleteFormAll('<?= esc($idKaryawan); ?>')">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center">Data Penilaian atau Kriteria tidak tersedia.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var penilaianData = <?= json_encode($penilaian); ?>;
        var kriteriaData = <?= json_encode($kriteria); ?>;

        function fillEditFormAll(idKaryawan) {
            document.getElementById('edit_all_id_karyawan').value = idKaryawan;
            kriteriaData.forEach(function(k) {
                var field = document.getElementById('edit_nilai_' + k.id_kriteria);
                if (penilaianData[idKaryawan] && penilaianData[idKaryawan][k.id_kriteria]) {
                    field.value = penilaianData[idKaryawan][k.id_kriteria];
                } else {
                    field.value = '';
                }
            });
        }

        function fillDeleteFormAll(idKaryawan) {
            document.getElementById('delete_id_karyawan').value = idKaryawan;
            var deleteSelect = document.getElementById('delete_id_kriteria');
            deleteSelect.innerHTML = '';

            if (penilaianData[idKaryawan]) {
                for (var kriteriaId in penilaianData[idKaryawan]) {
                    var namaKriteria = kriteriaData.find(k => k.id_kriteria == kriteriaId).nama_kriteria;
                    var option = document.createElement('option');
                    option.value = kriteriaId;
                    option.textContent = namaKriteria + ' (' + kriteriaId + ')';
                    deleteSelect.appendChild(option);
                }
            } else {
                var option = document.createElement('option');
                option.value = '';
                option.textContent = 'Tidak ada penilaian untuk karyawan ini';
                deleteSelect.appendChild(option);
            }

            // Atur action form berdasarkan pilihan kriteria
            deleteSelect.addEventListener('change', function() {
                var selectedKriteriaId = this.value;
                document.getElementById('formDeletePenilaian').action = "<?= site_url('penilaian/delete/') ?>" + idKaryawan + "/" + selectedKriteriaId;
            });

            // Set action form untuk kriteria pertama (jika ada) secara default
            if (deleteSelect.options.length > 0 && deleteSelect.value !== '') {
                var selectedKriteriaId = deleteSelect.value;
                document.getElementById('formDeletePenilaian').action = "<?= site_url('penilaian/delete/') ?>" + idKaryawan + "/" + selectedKriteriaId;
            }
        }
    </script>
</body>
</html>
