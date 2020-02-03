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
              <a type="button" data-toggle="modal" data-target="#insertLembur" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Lembur</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
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
                  <?php foreach($lembur->result() as $lmbr){ ?>
                    <tr>
                      <td><?php echo $lmbr->nama_lembur; ?></td>
                      <td style="text-align:center;"><?php echo $lmbr->satuan; ?></td>
                      <td><?php echo $lmbr->insentif; ?></td>
                      <td><?php echo $lmbr->keterangan; ?></td>
                      <td style="text-align:center;">
                        <!-- <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a> -->
                        <a type="button" data-toggle="modal" data-toggle="tooltip" title="Edit" data-target="#editLembur<?php echo $lmbr->id; ?>" class="btn btn-success" href="" role="button"><i class="ion ion-edit"></i></a>
                        <a data-toggle="tooltip" title="Hapus" type="button" class="btn btn-success" href="<?php echo base_url()?>admin/deleteLembur/<?php echo $lmbr->id; ?>" role="button"><i class="ion ion-trash-b"></i></a>
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
    <div id="insertLembur" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Tambah Data Lembur</h4>
      </div>
      <form action="<?php echo base_url()?>admin/insertLembur" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="ijenis_lembur">Jenis Lembur</label>
            <input type="text" class="form-control" id="ijenis_lembur" name="jenis_lembur" placeholder="Jenis Lembur">
          </div>
          <div class="form-group">
            <label for="isatuan">Satuan</label>
            <input type="text" class="form-control" id="isatuan" name="satuan" placeholder="Satuan">
          </div>
          <div class="form-group">
            <label for="iinsentif">Insentif (Rp.)</label>
            <input type="number" pattern="[0-9]" class="form-control" id="iinsentif" name="insentif" placeholder="Insentif (Tanpa Titik dan Koma)" value="0">
          </div>
          <div class="form-group">
            <label for="iketerangan_bonus">Keterangan</label>
            <input type="text" class="form-control" id="iketerangan_bonus" name="keterangan" placeholder="Keterangan">
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
<?php foreach($lembur->result() as $lmbr){ ?>
  <div id="editLembur<?php echo $lmbr->id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Edit Data Lembur</h4>
      </div>
      <form action="<?php echo base_url()?>admin/updateLembur" method="POST">
        <div class="modal-body">
          <div class="form-group">
          <input type="hidden" class="form-control" id="id_lembur" name="id_lembur" placeholder="" value="<?php echo $lmbr->id; ?>">
            <label for="ijenis_lembur">Jenis Lembur</label>
            <input type="text" class="form-control" id="ijenis_lembur" name="jenis_lembur" placeholder="Jenis Lembur" value="<?php echo $lmbr->nama_lembur; ?>">
          </div>
          <div class="form-group">
            <label for="isatuan">Satuan</label>
            <select class="form-control" id="isatuan" name="satuan">
              <option value="<?php echo $lmbr->satuan; ?>"><?php echo $lmbr->satuan; ?></option>
              <option value="per jam">Per Jam</option>
              <option value="per hari">Per Hari</option>
            </select>
          </div>
          <div class="form-group">
            <label for="iinsentif">Insentif (Rp.)</label>
            <input type="number" pattern="[0-9]" class="form-control" id="iinsentif" name="insentif" placeholder="Insentif (Tanpa Titik dan Koma)" value="<?php echo $lmbr->insentif; ?>">
          </div>
          <div class="form-group">
            <label for="iketerangan_bonus">Keterangan</label>
            <input type="text" class="form-control" id="iketerangan_bonus" name="keterangan" placeholder="Keterangan" value="<?php echo $lmbr->keterangan; ?>">
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
    $('#ijenis_lembur').val('');
    $('#isatuan').val('');
    $('#iinsentif').val('');
    $('#iketerangan_bonus').val('');

  });
</script>
