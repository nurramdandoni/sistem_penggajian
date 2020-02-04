<?php
$this->load->view("template/header");
$this->load->view("template/navbar");
$this->load->view("template/sidebar");
?>


<!-- icon : https://ionicons.com/v2/ -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice <?php echo $this->uri->segment(3); ?></h1>
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

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-warning">
              <h5><i class="fas fa-info"></i> Catatan:</h5>
              Pastikan Selalu Menyimpan Perubahan Data!
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Sekolah Tinggi Teknologi Bandung
                    <small class="float-right">Tanggal : <?php echo date('d/m/Y'); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, STT Bandung.</strong><br>
                    Jl. Soekarno Hatta No.378<br>
                    Kebon Lega, Karang Anyar<br>
                    Kota Bandung<br>
                    Email: https://sttbandung.ac.id
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $profile_karyawan->nama_karyawan; ?></strong><br>
                    <?php echo $profile_karyawan->alamat; ?><br>
                    No Telp: <?php echo $profile_karyawan->no_telp; ?><br>
                    Email: <?php echo $profile_karyawan->email; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <br>
                  <b>No. Induk Karyawan :</b> <?php echo $profile_karyawan->NIK; ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <p><b>Pokok :</b></p>
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Uraian</th>
                      <th>Jumlah (Rp.)</th>
                      <th>Qty.</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><input type="checkbox" checked/> Gaji Pokok</td>
                      <td><?php echo $profile_karyawan->gaji; ?></td>
                      <td>1</td>
                      <td><?php echo $profile_karyawan->gaji; ?></td>
                    </tr>
                    </tbody>
                  </table>
                  <p><b>Bonus :</b></p>
                  <p>Hari Kerja Periode (Senin - Jum'at) :</p>
                  <p>Hari Kerja Periode (Sabtu - Minggu) :</p>
                  <p>Kehadiran Tanpa Terlambat (Senin - Jumat) :</p>
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Uraian</th>
                        <th>Ketentuan</th>
                        <th>Jumlah Insentif (Rp.)</th>
                        <th>Qty.</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach($bonus->result() as $bns){ ?>
                          <tr>
                            <td><input type="checkbox"/> <?php echo $bns->nama_bonus; ?></td>
                            <td><?php echo $bns->keterangan; ?></td>
                            <td><?php echo $bns->insentif; ?></td>
                            <td><input type="text" value="" placeholder="Jumlah"></td>
                            <td>-</td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  <!-- /.col -->
                  <p><b>Lembur :</b></p>
                  <p>Lembur Shift 1 :</p>
                  <p>Lembur Shift 2 :</p>
                  <p>Lembur Shift 3 :</p>
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Uraian</th>
                        <th>Ketentuan</th>
                        <th>Jumlah Insentif (Rp.)</th>
                        <th>Qty.</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach($lembur->result() as $lmbr){ ?>
                          <tr>
                            <td><input type="checkbox"/> <?php echo $lmbr->nama_lembur; ?></td>
                            <td><?php echo $lmbr->keterangan; ?></td>
                            <td><?php echo $lmbr->insentif; ?></td>
                            <td><input type="text" value="" placeholder="Jumlah"></td>
                            <td>-</td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  <!-- /.col -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Pembayaran Gaji Via Transfer:</p>
                  <!-- <img src="../../dist/img/credit/visa.png" alt="Visa"> -->
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <!-- <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    <!-- Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. -->
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Tanggal : <?php echo date('d/m/Y'); ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>-</td>
                      </tr>
                      <tr>
                        <th>BPJS Ketenagakerjaan (2.0%)</th>
                        <td>-</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>-</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Simpan Perubahan
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$this->load->view("template/footer");
?>