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
            <h1>Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data Karyawan</li>
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
              <a type="button" data-toggle="modal" data-target="#insertKaryawan" class="btn btn-success" href="<?php echo base_url()?>admin" role="button">+ Tambah Data Karyawan</a>
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
                  <th style="text-align:center;">Tanggal Recruitment</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($karyawan->result() as $kry){ ?>
                    <tr>
                      <td><?php echo $kry->NIK; ?></td>
                      <td><?php echo $kry->nama_karyawan; ?></td>
                      <td><?php echo $kry->nama_divisi; ?></td>
                      <td style="text-align:center;"><?php echo $kry->nama_jabatan; ?></td>
                      <td style="text-align:center;"><?php echo $kry->tanggal_masuk; ?></td>
                      <td style="text-align:center;">
                        <!-- <a data-toggle="tooltip" title="Lihat" type="button" class="btn btn-success" href="<?php echo base_url()?>admin" role="button"><i class="ion ion-eye"></i></a> -->
                        <a type="button" data-toggle="modal" data-toggle="tooltip" title="Edit" data-target="#editKaryawan<?php echo $kry->NIK; ?>" class="btn btn-success" href="" role="button"><i class="ion ion-edit"></i></a>
                        <a data-toggle="tooltip" title="Hapus" type="button" class="btn btn-success" href="<?php echo base_url()?>admin/deleteKaryawan/<?php echo $kry->NIK; ?>" role="button"><i class="ion ion-trash-b"></i></a>
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
<div id="insertKaryawan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Tambah Data Karyawan</h4>
      </div>
      <form action="<?php echo base_url()?>admin/insertKaryawan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nik">NIK Karyawan</label>
            <input type="hidden" class="form-control" id="inik" name="nik" placeholder="NIK" value="<?php echo $lastNIK; ?>">
            <input type="text" class="form-control" id="inikshow" name="nikshow" placeholder="NIK" disabled value="<?php echo $lastNIK; ?>">
          </div>
          <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" class="form-control" id="inama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan">
          </div>
          <div class="form-group">
            <label for="id_divisi">Divisi</label>
            <!-- <input type="text" class="form-control" id="id_divisi" placeholder="Divisi"> -->
            <select class="form-control" id="iid_divisi" name="id_divisi">
              <?php foreach($divisi->result() as $dv){ ?>
                <option value="<?php echo $dv->id; ?>"><?php echo $dv->nama_divisi; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <!-- <input type="text" class="form-control" id="id_jabatan" placeholder="Jabatan"> -->
            <select class="form-control" id="iid_jabatan" name="id_jabatan">
              <?php foreach($jabatan->result() as $jb){ ?>
                <option value="<?php echo $jb->id; ?>"><?php echo $jb->nama_jabatan.' - Divisi :'.$jb->nama_divisi; ?></option>
              <?php } ?>
            </select>
          </div>
        <div class="form-group">
          <label for="tanggal_rec">Tanggal Recruitment</label>
          <input type="date" class="form-control" id="itanggal_rec" name="tanggal_rec" placeholder="Tanggal">
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
<?php foreach($karyawan->result() as $kry){ ?>
  <div id="editKaryawan<?php echo $kry->NIK; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content Insert-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Edit Data Karyawan</h4>
      </div>
      <form action="<?php echo base_url()?>admin/updateKaryawan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nik">NIK Karyawan</label>
            <input type="hidden" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?php echo $kry->NIK; ?>">
            <input type="text" class="form-control" id="nikshow" name="nikshow" placeholder="NIK" disabled value="<?php echo $kry->NIK; ?>">
          </div>
          <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $kry->nama_karyawan; ?>">
          </div>
          <div class="form-group">
            <label for="id_divisi">Divisi</label>
            <!-- <input type="text" class="form-control" id="id_divisi" placeholder="Divisi"> -->
            <select class="form-control" id="id_divisi" name="id_divisi">
              <?php foreach($divisi->result() as $dv){ ?>
                <option value="<?php echo $dv->id; ?>"><?php echo $dv->nama_divisi; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <!-- <input type="text" class="form-control" id="id_jabatan" placeholder="Jabatan"> -->
            <select class="form-control" id="id_jabatan" name="id_jabatan">
              <?php foreach($jabatan->result() as $jb){ ?>
                <option value="<?php echo $jb->id; ?>"><?php echo $jb->nama_jabatan.' - Divisi :'.$jb->nama_divisi; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tanggal_rec">Tanggal Recruitment</label>
            <input type="date" class="form-control" id="tanggal_rec" name="tanggal_rec" placeholder="Tanggal">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Simpan</button>
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
    $('#inik').val();
    $('#inikshow').val();
    $('#inama_karyawan').val('');
    // $('#iid_divisi').val('');
    // $('#iid_jabatan').val('');
    $('#itanggal_rec').val('');

  });
</script>
