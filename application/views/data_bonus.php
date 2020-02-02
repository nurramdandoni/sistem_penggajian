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
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">Nama Bonus</th>
                  <th style="text-align:center;">Insentif (Rp.)</th>
                  <th style="text-align:center;">Keterangan</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($bonus->result() as $bns){ ?>
                    <tr>
                      <td><?php echo $bns->nama_bonus; ?></td>
                      <td><?php echo $bns->insentif; ?></td>
                      <td><?php echo $bns->keterangan; ?></td>
                      <td style="text-align:center;">
                        <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                        <a data-toggle="tooltip" title="Edit" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-edit"></i></a>
                        <a data-toggle="tooltip" title="Hapus" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-trash-b"></i></a>
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
