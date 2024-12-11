<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perankingan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p5yY0+E8qHI4Uw7mDDrPvE3JN1W4aP4TkMFnf7mClXzR7Hn2RkSK+o1aTfA8yZc1YHNuwCXmHzkM+jgYq0kK6w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/style.css') ?>">
</head>
<body>
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper p-3">
            <!-- Content Header -->
            <div class="content-header mb-3">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Hasil Perankingan</h1>
                        </div>
                        <div class="col-sm-6 text-end">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('Home/index'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Hasil Perankingan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Perankingan -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Tabel Perankingan Karyawan</h3>
                </div>
                <div class="card-body p-3">
                    <?php if (!empty($ranking)): ?>
                        <div class="table-responsive">
                        <table class="table table-hover align-middle text-balck">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Karyawan</th>
                                        <th>Nilai Preferensi</th>
                                        <th>Peringkat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 0;
                                    foreach ($ranking as $row): 
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= esc($row->Nama_Karyawan); ?></td>
                                            <td><?= round($row->PreferenceValue, 3); ?></td>
                                            <td><?= $no; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if ($no === 0): ?>
                            <div class="alert alert-warning text-center">Data perankingan belum tersedia.</div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="alert alert-warning text-center">Data perankingan belum tersedia.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
