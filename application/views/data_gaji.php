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
            <h1>Data Gaji</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data Gaji</li>
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
              <a type="button" data-toggle="modal" data-target="#insertGaji" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Gaji</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">Nama Jabatan</th>
                  <th style="text-align:center;">Gaji (Rp.)</th>
                  <th style="text-align:center;">Keterangan</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($gaji->result() as $gj){ ?>
                    <tr>
                      <td><?php echo $gj->nama_jabatan; ?></td>
                      <td><?php echo $gj->gaji; ?></td>
                      <td><?php echo $gj->keterangan; ?></td>
                      <td style="text-align:center;">
                        <!-- <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a> -->
                        <a type="button" data-toggle="modal" data-toggle="tooltip" title="Edit" data-target="#editGaji<?php echo $gj->id; ?>" class="btn btn-success" href="" role="button"><i class="ion ion-edit"></i></a>
                        <a data-toggle="tooltip" title="Hapus" type="button" class="btn btn-success" href="<?php echo base_url()?>admin/deleteGaji/<?php echo $gj->id; ?>" role="button"><i class="ion ion-trash-b"></i></a>
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

    <!-- Modal Insert -->
<div id="insertGaji" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Tambah Data Gaji</h4>
      </div>
      <form action="<?php echo base_url()?>admin/insertGaji" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <select class="form-control" id="nama_jabatan" name="id_jabatan">
              <?php foreach($jabatan->result() as $jb){ ?>
                <option value="<?php echo $jb->id; ?>"><?php echo $jb->nama_jabatan; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="igaji_jabatan">Gaji</label>
            <input type="number" pattern="[0-9]" class="form-control" id="igaji_jabatan" name="gaji_jabatan" placeholder="Gaji (Tanpa Titik dan Koma)" value="0">
          </div>
          <div class="form-group">
            <label for="iketerangan_gaji">Keterangan</label>
            <input type="text" class="form-control" id="iketerangan_gaji" name="keterangan" placeholder="Keterangan">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Insert -->

<!-- Modal Edit -->
<?php foreach($gaji->result() as $gj){ ?>
  <div id="editGaji<?php echo $gj->id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Edit Data Gaji</h4>
      </div>
      <form action="<?php echo base_url()?>admin/updateGaji" method="POST">
        <div class="modal-body">
          <div class="form-group">
          <input type="hidden" class="form-control" id="id_gaji" name="id_gaji" placeholder="" value="<?php echo $gj->id; ?>">
            <label for="nama_jabatan">Nama Jabatan</label>
            <select class="form-control" id="nama_jabatan" name="id_jabatan">
              <option value="<?php echo $gj->id_jabatan; ?>"><?php echo $gj->nama_jabatan; ?></option>
              <?php foreach($jabatan->result() as $jb){ ?>
                <option value="<?php echo $jb->id; ?>"><?php echo $jb->nama_jabatan; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="igaji_jabatan">Gaji</label>
            <input type="number" pattern="[0-9]" class="form-control" id="igaji_jabatan" name="gaji_jabatan" placeholder="Gaji (Tanpa Titik dan Koma)" value="<?php echo $gj->gaji; ?>">
          </div>
          <div class="form-group">
            <label for="iketerangan_gaji">Keterangan</label>
            <input type="text" class="form-control" id="iketerangan_gaji" name="keterangan" placeholder="Keterangan" value="<?php echo $gj->keterangan; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<!-- Akhir Modal Edit -->
  
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

  $(document).ready(function(){
    $('#igaji_jabatan').val('');
    $('#iketerangan_gaji').val('');

  });
</script>
