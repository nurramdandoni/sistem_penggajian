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
            <h1>Laporan Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Invoice Penggajian</a></li>
              <li class="breadcrumb-item active">Laporan Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    
    $submit_range = true;
    if($submit_range){ ?>
    <!-- form -->
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
                  <form role="form">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Awal</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Awal">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Akhir">
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
                  <th style="text-align:center;">Nama Laporan</th>
                  <th style="text-align:center;">Jumlah Karyawan</th>
                  <th style="text-align:center;">Range Tanggal</th>
                  <th style="text-align:center;">Laporan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Laporan Invoice Periode</td>
                  <td style="text-align:center;">12 Orang</td>
                  <td style="text-align:center;">26 Agustus 2019 s/d 25 September 2019</td>
                  <td style="text-align:center;">
                    <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a>
                    <a data-toggle="tooltip" title="Print" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion-printer"></i></a>
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
                  <form role="form">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Awal</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Awal">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Akhir">
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
