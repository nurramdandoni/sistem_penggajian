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
            <h1>Data Bonus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data Bonus</li>
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
              <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Bonus</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">Nama Bonus</th>
                  <th style="text-align:center;">Bonus (Rp.)</th>
                  <th style="text-align:center;">Keterangan</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Bonus Kehadiran</td>
                  <td style="text-align:center;">200.000</td>
                  <td style="text-align:center;">Reward Bulanan Tanpa Telat</td>
                  <td style="text-align:center;">
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Bonus Kehadiran Harian</td>
                  <td style="text-align:center;">8.000</td>
                  <td style="text-align:center;">Reward Harian Tanpa Telat</td>
                  <td style="text-align:center;">
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Bonus Kinerja</td>
                  <td style="text-align:center;">300.000</td>
                  <td style="text-align:center;">Berdasarkan Laporan Atasan Langsung</td>
                  <td style="text-align:center;">
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
                  </td>
                </tr>
                
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
