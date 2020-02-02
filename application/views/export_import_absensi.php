<?php
$this->load->view("template/header");
$this->load->view("template/navbar");
$this->load->view("template/sidebar");
?>

<!-- icon : https://ionicons.com/v2/ -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Export - Import Data Absensi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Absensi Karyawan</a></li>
          <li class="breadcrumb-item active">Export - Import</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Export</h3>

              <p>Data Absensi</p>
            </div>
            <div class="icon">
              <i class="ion-ios-download"></i>
            </div>
            <a href="#" class="small-box-footer">Export <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Import</h3>

              <p>Data Absensi</p>
            </div>
            <div class="icon">
              <i class="ion-ios-upload"></i>
            </div>
            <a href="#" class="small-box-footer">Import <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$this->load->view("template/footer");
?>