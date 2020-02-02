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
            <h1>Data Lembur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data Lembur</li>
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
              <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Lembur</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">Jenis Lembur</th>
                  <th style="text-align:center;">Satuan</th>
                  <th style="text-align:center;">Insentif (Rp.)</th>
                  <th style="text-align:center;">Keterangan</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Lembur Hari Normal Shift 1</td>
                  <td style="text-align:center;">per Jam</td>
                  <td>10.000</td>
                  <td>Sistem Flat</td>
                  <td style="text-align:center;">
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Lembur Hari Normal Shift 2</td>
                  <td style="text-align:center;">per Jam</td>
                  <td>10.000</td>
                  <td>Sistem Flat</td>
                  <td style="text-align:center;">
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Lembur Hari Normal Shift 3</td>
                  <td style="text-align:center;">per Jam</td>
                  <td>10.000</td>
                  <td>Sistem Flat</td>
                  <td style="text-align:center;">
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Lembur Hari Normal All Shift</td>
                  <td style="text-align:center;">per Jam ( < 5 Jam )</td>
                  <td>10.000</td>
                  <td>Sistem Relative</td>
                  <td style="text-align:center;">
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                    <a type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Lembur Hari Normal All Shift</td>
                  <td style="text-align:center;">per Jam ( >= 5 Jam )</td>
                  <td>15.000</td>
                  <td>Sistem Relative</td>
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
