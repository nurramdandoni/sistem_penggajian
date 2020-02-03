<?php
$this->load->view("template/header");
$this->load->view("template/navbar");
$this->load->view("template/sidebar");
?>
<style>
div.dataTables_filter {
   float: right;
   text-align: right;
}
div.dataTables_paginate{
   float: right;
   text-align: right;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Absensi Karyawan</a></li>
              <li class="breadcrumb-item active">Data Absensi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h1 class="card-title">Data Karyawan</h1> -->
              <!-- <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Karyawan</a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">NIK</th>
                  <th style="text-align:center;">Nama Karyawan</th>
                  <th style="text-align:center;">Divisi</th>
                  <th style="text-align:center;">Jabatan</th>
                  <th style="text-align:center;">Tanggal Recruitment</th>
                  <th style="text-align:center;">Absensi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($karyawan->result() as $kry){ ?>
                    <tr>
                      <td><?php echo $kry->NIK; ?></td>
                      <td><?php echo $kry->nama_karyawan; ?></td>
                      <td><?php echo $kry->nama_divisi; ?></td>
                      <td style="text-align:center;"><?php echo $kry->nama_jabatan; ?></td>
                      <td style="text-align:center;"><?php echo $kry->tanggal_masuk; ?></td>
                      <td style="text-align:center;">
                      <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin/lihatAbsensi/<?php echo $kry->NIK; ?>" role="button"><i class="ion ion-eye"></i></a>
                      <!-- <a data-toggle="tooltip" title="Export" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion-ios-download"></i></a> -->
                      <!-- <a data-toggle="tooltip" title="Import" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion-ios-upload"></i></a> -->
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
<?php
$this->load->view("template/footer");
?>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "responsive": true
    });
  });
</script>
