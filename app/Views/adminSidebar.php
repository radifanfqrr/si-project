<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('Home/index'); ?>" class="brand-link">
        <img src="dist/img/logo uin.png" alt="Logo Perusahaan" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-dark">Karyawan Terbaik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?php echo site_url('Home/index'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Data Karyawan -->
                <li class="nav-item">
                    <a href="<?php echo site_url('KaryawanController/viewKaryawan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Karyawan</p>
                    </a>
                </li>
                <!-- Data Kriteria -->
                <li class="nav-item">
                    <a href="<?php echo site_url('KriteriaController/viewKriteria'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Data Kriteria</p>
                    </a>
                </li>
                <!-- Data Penilaian -->
                <li class="nav-item">
                    <a href="<?php echo site_url('PenilaianController/viewPenilaian'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Data Penilaian</p>
                    </a>
                </li>
                <!-- Matriks Normalisasi -->
                <li class="nav-item">
                    <a href="<?php echo site_url('MooraController/viewNormalization'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Matriks Normalisasi</p>
                    </a>
                </li>
                <!-- Perankingan MOORA -->
                <li class="nav-item">
                    <a href="<?php echo site_url('MooraController/viewRanking'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Perankingan MOORA</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
