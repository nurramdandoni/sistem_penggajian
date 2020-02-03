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
            <h1>Data Invoice Penggajian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Invoice Penggajian</a></li>
              <li class="breadcrumb-item active">Data Invoice Penggajian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php

    $Rawal = $this->session->userdata('awalRange');
    $Rakhir = $this->session->userdata('akhirRange');
    
    if($Rawal != NULL AND $Rakhir != NULL){
      $submit_range = true;
    }else{
      $submit_range = false;
    }
    
    if($submit_range){ ?>
    <!-- form -->
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Rentang Tanggal Invoice (<?php echo $this->session->userdata('awalRange')." - ".$this->session->userdata('akhirRange'); ?>) </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url()?>admin/setRangeInvoice" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="tanggalAwal">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" placeholder="Tanggal Awal">
                      </div>
                      <div class="form-group">
                        <label for="tanggalAkhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir" placeholder="Tanggal Akhir">
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- akhir form -->

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
                  <th style="text-align:center;">Range Tanggal</th>
                  <th style="text-align:center;">Invoice</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($karyawan->result() as $kry){ ?>
                    <tr>
                      <td><?php echo $kry->NIK; ?></td>
                      <td><?php echo $kry->nama_karyawan; ?></td>
                      <td><?php echo $kry->nama_divisi; ?></td>
                      <td style="text-align:center;"><?php echo $kry->nama_jabatan; ?></td>
                      <td style="text-align:center;"><?php echo $this->session->userdata('awalRange')." - ".$this->session->userdata('akhirRange'); ?></td>
                      <td style="text-align:center;">
                        <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                        <!-- <a data-toggle="tooltip" title="Print" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion-printer"></i></a> -->
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

    <?php }else{
      ?>

      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Rentang Tanggal Invoice</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url()?>admin/setRangeInvoice" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="tanggalAwal">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" placeholder="Tanggal Awal">
                      </div>
                      <div class="form-group">
                        <label for="tanggalAkhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir" placeholder="Tanggal Akhir">
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <?php } ?>
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
