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
            <h1>Data Absensi ( <?php echo $this->uri->segment(3); ?> )S</h1>
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
                  <th style="text-align:center;">Tanggal</th>
                  <th style="text-align:center;">Shift</th>
                  <th style="text-align:center;">Jam Masuk</th>
                  <th style="text-align:center;">Jam Keluar</th>
                  <th style="text-align:center;">Jam Kerja</th>
                  <th style="text-align:center;">Jam Lembur</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($absensi->result() as $absn){ ?>
                    <tr>
                      <td><?php echo $absn->id_karyawan; ?></td>
                      <td><?php echo $absn->nama_karyawan; ?></td>
                      <td><?php echo $absn->tanggal; ?></td>
                      <td style="text-align:center;"><?php echo $absn->nama_shift; ?></td>
                      <td style="text-align:center;"><?php echo $absn->jam_masuk; ?></td>
                      <td style="text-align:center;"><?php echo $absn->jam_keluar; ?>
                      <td style="text-align:center;"><?php echo $absn->jam_kerja; ?>
                      </td><td style="text-align:center;">
                        <?php 
                        $jam = $absn->jam_kerja;
                        $arr = explode(':', $jam);
                        $lm = $arr[0]-8;
                        echo $lm.' Jam';
                         ?>
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
