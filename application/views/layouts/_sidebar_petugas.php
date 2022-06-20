<!-- Sidebar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?= base_url("$logo") ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 9pt">TUKIN BPPNDDTT BANJARMASIN</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="<?php 
            if (@$userdata->photo) {
                echo base_url('assets/uploads/images/foto_profil/' . $userdata->photo); 
            } else {
                echo base_url('assets/uploads/images/no_image.png');
            }
                ?>  " class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block"><?= $userdata->first_name ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline d-none">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <!-- <li class="nav-header">LABELS</li> -->
            <li class="nav-item">
                <a href="<?= base_url() ?>" class="nav-link <?php if($c_judul == "Dashboard") {echo 'active';} ?>">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('petugas/kehadiran') ?>" class="nav-link  <?php if($c_judul == "Kehadiran") {echo 'active';} ?>">
                    <i class="nav-icon far fa-calendar-check"></i>
                    <p>Kehadiran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('petugas/tunjangan') ?>" class="nav-link  <?php if($c_judul == "Tunjangan") {echo 'active';} ?>">
                    <i class="nav-icon fas fa-coins"></i>
                    <p>Tunjangan</p>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- asas -->