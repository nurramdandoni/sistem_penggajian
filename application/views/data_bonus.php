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
              <a type="button" data-toggle="modal" data-target="#insertBonus" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Bonus</a>
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
                        <!-- <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a> -->
                        <a type="button" data-toggle="modal" data-toggle="tooltip" title="Edit" data-target="#editBonus<?php echo $bns->id; ?>" class="btn btn-success" href="" role="button"><i class="ion ion-edit"></i></a>
                        <a data-toggle="tooltip" title="Hapus" type="button" class="btn btn-success" href="<?php echo base_url()?>admin/deleteBonus/<?php echo $bns->id; ?>" role="button"><i class="ion ion-trash-b"></i></a>
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
    <div id="insertBonus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Tambah Data Bonus</h4>
      </div>
      <form action="<?php echo base_url()?>admin/insertBonus" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="inama_bonus">Nama Bonus</label>
            <input type="text" class="form-control" id="inama_bonus" name="nama_bonus" placeholder="Nama Bonus">
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
<?php foreach($bonus->result() as $bns){ ?>
  <div id="editBonus<?php echo $bns->id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Edit Data Bonus</h4>
      </div>
      <form action="<?php echo base_url()?>admin/updateBonus" method="POST">
        <div class="modal-body">
          <div class="form-group">
          <input type="hidden" class="form-control" id="id_bonus" name="id_bonus" placeholder="" value="<?php echo $bns->id; ?>">
            <label for="inama_bonus">Nama Bonus</label>
            <input type="text" class="form-control" id="inama_bonus" name="nama_bonus" placeholder="Nama Bonus" value="<?php echo $bns->nama_bonus; ?>">
          </div>
          <div class="form-group">
            <label for="iinsentif">Insentif (Rp.)</label>
            <input type="number" pattern="[0-9]" class="form-control" id="iinsentif" name="insentif" placeholder="Bonus (Tanpa Titik dan Koma)" value="<?php echo $bns->insentif; ?>">
          </div>
          <div class="form-group">
            <label for="iketerangan_bonus">Keterangan</label>
            <input type="text" class="form-control" id="iketerangan_bonus" name="keterangan" placeholder="Keterangan" value="<?php echo $bns->keterangan; ?>">
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
    $('#inama_bonus').val('');
    $('#iinsentif').val('');
    $('#iketerangan_bonus').val('');

  });
</script>
