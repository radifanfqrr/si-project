<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matriks Normalisasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/custom.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="content-wrapper p-3">
        <div class="content-header mb-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Matriks Normalisasi</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('Home/index') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Matriks Normalisasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Normalisasi Nilai</h3>
                    </div>
                    <div class="card-body p-3">
                        <?php if (!empty($normalizedMatrix)): ?>
                            <div class="table-responsive">
                            <table class="table table-hover align-middle text-black">
                                    <thead>
                                        <tr>
                                            <th>ID Karyawan</th>
                                            <?php foreach ($kriteria as $kr): ?>
                                                <!-- Tampilkan nama kriteria beserta ID-nya -->
                                                <th><?= esc($kr['nama_kriteria']) ?> (<?= esc($kr['id_kriteria']) ?>)</th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($karyawan as $kar): ?>
                                            <tr>
                                                <td><?= esc($kar['id_karyawan']) ?></td>
                                                <?php foreach ($kriteria as $kr): ?>
                                                    <td>
                                                        <?php
                                                        if (isset($normalizedMatrix[$kar['id_karyawan']][$kr['id_kriteria']])) {
                                                            echo round($normalizedMatrix[$kar['id_karyawan']][$kr['id_kriteria']], 3);
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning">Data normalisasi belum tersedia.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
