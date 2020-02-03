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
            <h1>Data Jabatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data Jabatan</li>
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
              <a type="button" data-toggle="modal" data-target="#insertJabatan" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Jabatan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">Nama Jabatan</th>
                  <th style="text-align:center;">Masa Jabatan</th>
                  <th style="text-align:center;">Masa Promosi (Setelah*)</th>
                  <th style="text-align:center;">Divisi</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($jabatan->result() as $jbt){ ?>
                    <tr>
                      <td><?php echo $jbt->nama_jabatan; ?></td>
                      <td style="text-align:center;"><?php echo $jbt->masa_jabatan.' Tahun';; ?></td>
                      <td style="text-align:center;"><?php echo $jbt->masa_promosi.' Tahun'; ?></td>
                      <td style="text-align:center;"><?php echo $jbt->nama_divisi ?></td>
                      <td style="text-align:center;">
                        <!-- <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a> -->
                        <a type="button" data-toggle="modal" data-toggle="tooltip" title="Edit" data-target="#editJabatan<?php echo $jbt->id; ?>" class="btn btn-success" href="" role="button"><i class="ion ion-edit"></i></a>
                        <a data-toggle="tooltip" title="Hapus" type="button" class="btn btn-success" href="<?php echo base_url()?>admin/deleteJabatan/<?php echo $jbt->id; ?>" role="button"><i class="ion ion-trash-b"></i></a>
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
<div id="insertJabatan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Tambah Data Jabatan</h4>
      </div>
      <form action="<?php echo base_url()?>admin/insertJabatan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="inama_jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" id="inama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan">
          </div>
          <div class="form-group">
            <label for="iid_divisi">Divisi</label>
            <!-- <input type="text" class="form-control" id="id_divisi" placeholder="Divisi"> -->
            <select class="form-control" id="iid_divisi" name="id_divisi">
              <?php foreach($divisi->result() as $dv){ ?>
                <option value="<?php echo $dv->id; ?>"><?php echo $dv->nama_divisi; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="imasa_jabatan">Masa Jabatan (Tahun)</label>
            <input type="text" class="form-control" id="imasa_jabatan" name="masa_jabatan" placeholder="Masa Jabatan" value="0">
          </div>
          <div class="form-group">
            <label for="ipromosi_jabatan">Promosi Jabatan (Tahun)</label>
            <input type="text" class="form-control" id="ipromosi_jabatan" name="promosi_jabatan" placeholder="Promosi Jabatan" value="0">
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
<?php foreach($jabatan->result() as $jbt){ ?>
  <div id="editJabatan<?php echo $jbt->id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Edit Data Jabatan</h4>
      </div>
      <form action="<?php echo base_url()?>admin/updateJabatan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <input type="hidden" class="form-control" id="id_jabatan" name="id_jabatan" placeholder="ID Jabatan" value="<?php echo $jbt->id; ?>">
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan" value="<?php echo $jbt->nama_jabatan; ?>">
          </div>
          <div class="form-group">
            <label for="id_divisi">Divisi</label>
            <!-- <input type="text" class="form-control" id="id_divisi" placeholder="Divisi"> -->
            <select class="form-control" id="id_divisi" name="id_divisi">
            <option value="<?php echo $jbt->id_divisi; ?>"><?php echo $jbt->nama_divisi; ?></option>
              <?php foreach($divisi->result() as $dv){ ?>
                <option value="<?php echo $dv->id; ?>"><?php echo $dv->nama_divisi; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="masa_jabatan">Masa Jabatan (Tahun)</label>
            <input type="text" class="form-control" id="masa_jabatan" name="masa_jabatan" placeholder="Masa Jabatan"  value="<?php echo $jbt->masa_jabatan; ?>">
          </div>
          <div class="form-group">
            <label for="promosi_jabatan">Promosi Jabatan (Tahun)</label>
            <input type="text" class="form-control" id="promosi_jabatan" name="promosi_jabatan" placeholder="Promosi Jabatan"  value="<?php echo $jbt->masa_promosi; ?>">
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
    $('#inama_jabatan').val('');
    $('#imasa_jabatan').val('0');
    $('#ipromosi_jabatan').val('0');

  });
</script>
