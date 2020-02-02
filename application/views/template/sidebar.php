<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link">
      <img src="<?php echo base_url();?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Penggajian</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nama User Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataKaryawan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataJabatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataGaji" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Gaji</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataBonus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bonus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataLembur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Lembur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataShift" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Shift</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Absensi Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataListAbsensi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/exportimportAbsensi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export/ Import</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Invoice Penggajian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getDataInvoice" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Invoice Penggajian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/getLaporanInvoice" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Invoice</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
