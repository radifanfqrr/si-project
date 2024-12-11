<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kriteria</title>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="content-wrapper p-3">
        <div class="content-header mb-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Kriteria</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('home/index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Data Kriteria</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <?php if (session()->has('success')): ?>
            <div class="alert alert-success"><?= session('success'); ?></div>
        <?php elseif (session()->has('error')): ?>
            <div class="alert alert-danger"><?= session('error'); ?></div>
        <?php endif; ?>

        <!-- Card with table -->
        <div class="card shadow-sm">
            <div class="card-header">
                Data Kriteria
            </div>
            <div class="card-body p-3">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Kriteria</button>
                    </div>
                    <div class="col-md-6 text-end">
                        <form class="form-inline" action="<?= site_url('kriteria/viewKriteria') ?>" method="get">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" name="keyword" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover align-middle text-black">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kriteria as $row): ?>
                            <tr>
                                <td><?= esc($row['id_kriteria']) ?></td>
                                <td><?= esc($row['nama_kriteria']) ?></td>
                                <td><?= esc($row['bobot']) ?></td>
                                <td><?= esc($row['jenis_kriteria']) ?></td>
                                <td>
                                    <a href="<?= site_url('kriteria/delete/' . $row['id_kriteria']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        onclick="setEditForm('<?= esc($row['id_kriteria']) ?>', '<?= esc($row['nama_kriteria']) ?>', '<?= esc($row['bobot']) ?>', '<?= esc($row['jenis_kriteria']) ?>')">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <form action="<?= site_url('kriteria/create') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input type="number" class="form-control" id="bobot" name="bobot" required step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kriteria" class="form-label">Jenis</label>
                        <select class="form-select" id="jenis_kriteria" name="jenis_kriteria" required>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <form action="" method="post" id="formEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Edit Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id_kriteria" name="id_kriteria">
                        <div class="mb-3">
                            <label for="edit_nama_kriteria" class="form-label">Nama Kriteria</label>
                            <input type="text" class="form-control" id="edit_nama_kriteria" name="nama_kriteria" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_bobot" class="form-label">Bobot</label>
                            <input type="number" class="form-control" id="edit_bobot" name="bobot" required step="0.01">
                        </div>
                        <div class="mb-3">
                            <label for="edit_jenis_kriteria" class="form-label">Jenis</label>
                            <select class="form-select" id="edit_jenis_kriteria" name="jenis_kriteria" required>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-end mb-3 me-3">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function setEditForm(id, nama, bobot, jenis) {
            document.getElementById('edit_id_kriteria').value = id;
            document.getElementById('edit_nama_kriteria').value = nama;
            document.getElementById('edit_bobot').value = bobot;
            document.getElementById('edit_jenis_kriteria').value = jenis;
            document.getElementById('formEdit').action = "<?= site_url('kriteria/edit/') ?>" + id;
        }
    </script>
</body>
</html>
