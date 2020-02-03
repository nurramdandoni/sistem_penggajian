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
            <h1>Data Shift</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data Shift</li>
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
              <a type="button" data-toggle="modal" data-target="#insertShift" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Shift</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="text-align:center;">Jenis Shift</th>
                  <th style="text-align:center;">Jam Kerja</th>
                  <th style="text-align:center;">Keterangan</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                  <?php foreach($shift->result() as $shf){ ?>
                    <tr>
                      <td><?php echo $shf->nama_shift; ?></td>
                      <td style="text-align:center;"><?php echo $shf->jam_awal.' - '.$shf->jam_akhir.' WIB'; ?></td>
                      <td><?php echo $shf->keterangan; ?></td>
                      <td style="text-align:center;">
                        <!-- <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a> -->
                        <a type="button" data-toggle="modal" data-toggle="tooltip" title="Edit" data-target="#editShift<?php echo $shf->id; ?>" class="btn btn-success" href="" role="button"><i class="ion ion-edit"></i></a>
                        <a data-toggle="tooltip" title="Hapus" type="button" class="btn btn-success" href="<?php echo base_url()?>admin/deleteShift/<?php echo $shf->id; ?>" role="button"><i class="ion ion-trash-b"></i></a>
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
    <div id="insertShift" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Tambah Data Shift</h4>
      </div>
      <form action="<?php echo base_url()?>admin/insertShift" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="inama_shift">Nama Shift</label>
            <input type="text" class="form-control" id="inama_shift" name="nama_shift" placeholder="Nama Shift">
          </div>
          <div class="form-group">
            <label for="ijammasuk">Jam Masuk</label>
            <input type="time" class="form-control" id="ijammasuk" name="jammasuk" placeholder="Jam Masuk">
          </div>
          <div class="form-group">
            <label for="ijamkeluar">Jam Keluar</label>
            <input type="time" class="form-control" id="ijamkeluar" name="jamkeluar" placeholder="Jam keluar">
          </div>
          <div class="form-group">
            <label for="iketerangan_shift">Keterangan</label>
            <input type="text" class="form-control" id="iketerangan_shift" name="keterangan" placeholder="Keterangan">
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
<?php foreach($shift->result() as $shf){ ?>
  <div id="editShift<?php echo $shf->id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Edit Data Shift</h4>
      </div>
      <form action="<?php echo base_url()?>admin/updateShift" method="POST">
        <div class="modal-body">
          <div class="form-group">
          <input type="hidden" class="form-control" id="id_shift" name="id_shift" placeholder="" value="<?php echo $shf->id; ?>">
            <label for="inama_shift">Nama Shift</label>
            <input type="text" class="form-control" id="nama_shift" name="nama_shift" placeholder="Nama Shift" value="<?php echo $shf->nama_shift; ?>">
          </div>
          <div class="form-group">
            <label for="ijammasuk">Jam Masuk</label>
            <input type="time" class="form-control" id="jammasuk" name="jammasuk" placeholder="Jam Masuk" value="<?php echo $shf->jam_awal; ?>">
          </div>
          <div class="form-group">
            <label for="ijamkeluar">Jam Keluar</label>
            <input type="time" class="form-control" id="jamkeluar" name="jamkeluar" placeholder="Jam keluar" value="<?php echo $shf->jam_akhir; ?>">
          </div>
          <div class="form-group">
            <label for="iketerangan_shift">Keterangan</label>
            <input type="text" class="form-control" id="keterangan_shift" name="keterangan" placeholder="Keterangan" value="<?php echo $shf->keterangan; ?>">
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
    $('#inama_shift').val('');
    $('#ijammasuk').val('');
    $('#ijamkeluar').val('');
    $('#iketerangan_shift').val('');

  });
</script>
