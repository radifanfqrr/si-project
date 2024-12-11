<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/style.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/logo-company.png" alt="Logo Perusahaan" height="60" width="60">
        </div>

        <!-- Sidebar & Navbar should be included here, assumed via include or separate layout -->

        <div class="content-wrapper p-3">
            <!-- Content Header (Page header) -->
            <div class="content-header mb-3">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6 text-end">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('Home/index'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Singkat -->
            <section class="content">
                <div class="container-fluid">
                    <div class="alert alert-info" role="alert">
                        <p>
                            Selamat datang di aplikasi penilaian karyawan! Program ini dirancang untuk membantu perusahaan 
                            mencari atau menilai karyawan terbaik menggunakan metode MOORA. Dengan data kriteria penilaian 
                            yang terukur dan objektif, Anda dapat menentukan peringkat karyawan secara efisien dan akurat.
                        </p>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    $db = \Config\Database::connect();
                                    $query = $db->query('SELECT COUNT(*) as count FROM karyawan');
                                    $result = $query->getRow();
                                    ?>
                                    <h3><?= $result->count ?></h3>
                                    <p>Karyawan Terdaftar</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?php echo site_url('KaryawanController/viewKaryawan'); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $query = $db->query('SELECT COUNT(*) as count FROM kriteria');
                                    $result = $query->getRow();
                                    ?>
                                    <h3><?= $result->count ?></h3>
                                    <p>Kriteria Penilaian</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <a href="<?php echo site_url('KriteriaController/viewKriteria'); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>MOORA</h3>
                                    <p>Metode Perhitungan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <a href="<?php echo site_url('MooraController/viewRanking'); ?>" class="small-box-footer">
                                    Lihat Perankingan <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
