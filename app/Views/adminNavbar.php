<nav class="main-header navbar navbar-expand navbar-white navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('Home/index'); ?>" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                Data Master
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo site_url('KaryawanController/viewKaryawan'); ?>">Data Karyawan</a>
                <a class="dropdown-item" href="<?php echo site_url('KriteriaController/viewKriteria'); ?>">Data Kriteria</a>
                <a class="dropdown-item" href="<?php echo site_url('PenilaianController/viewPenilaian'); ?>">Data Penilaian</a>
            </div>
        </li>
    </ul>
</nav>
