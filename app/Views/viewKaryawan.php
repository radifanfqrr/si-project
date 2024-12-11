<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="content-wrapper p-3">
        <div class="content-header mb-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Karyawan</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('home/index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Data Karyawan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success"><?= session('success'); ?></div>
        <?php elseif (session()->has('error')): ?>
            <div class="alert alert-danger"><?= session('error'); ?></div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-header">
                Data Karyawan
            </div>
            <div class="card-body p-3">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data Karyawan</button>
                    </div>
                    <div class="col-md-6 text-end">
                        <form class="form-inline" action="<?= site_url('karyawan/viewKaryawan') ?>" method="get">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" name="keyword" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-striped align-middle bg-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alternatif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($karyawan as $row): ?>
                            <tr>
                                <td><?= esc($row['id_karyawan']) ?></td>
                                <td><?= esc($row['nama_karyawan']) ?></td>
                                <td><?= esc($row['alternatif']) ?></td>
                                <td>
                                    <a href="<?= site_url('karyawan/delete/' . $row['id_karyawan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        onclick="setEditForm('<?= esc($row['id_karyawan']) ?>', '<?= esc($row['nama_karyawan']) ?>')">Edit</button>
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
                <form action="<?= site_url('karyawan/create') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
                    </div>
                    <div class="mb-3">
                        <label for="alternatif" class="form-label">Alternatif</label>
                        <textarea class="form-control" id="alternatif" name="alternatif" rows="3" required></textarea>
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
                        <h5 class="modal-title" id="modalEditLabel">Edit Data Karyawan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id_karyawan" name="id_karyawan">
                        <div class="mb-3">
                            <label for="edit_nama_karyawan" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" id="edit_nama_karyawan" name="nama_karyawan" required>
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
        function setEditForm(id, nama) {
            document.getElementById('edit_id_karyawan').value = id;
            document.getElementById('edit_nama_karyawan').value = nama;
            document.getElementById('formEdit').action = "<?= site_url('karyawan/edit/') ?>" + id;
        }
    </script>
</body>
</html>
