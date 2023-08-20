<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input Absensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Input Absensi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Pilih Kelas</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group date" id="" data-target-input="nearest">
                    <input id="date" type="text" class="form-control datetimepicker-input"  value="<?php  echo date('2023-08-15') ?>" readonly>
                    <div class="input-group-append">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <select id="kelas" class="form-control select2" style="width: 100%;" required="">
                  <option value="">-- Pilih Kelas --</option>
                  <?php foreach ($kelas as $kelas): ?>
                    <option value="<?php echo $kelas->nama_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Pergi ke <a href="<?php echo site_url('admin/laporan_hari'); ?>">Laporan Hari ini</a> Jika ingin mengedit daftar absensi yang sudah di input.
        </div>
      </div>
      <form action="<?php echo base_url() ?>admin/input_absen" method="post">
        <div class="card card-default table-responsive" id="dataguru">
          <div class="card-header"> 
            <h3 class="card-title">Input Absensi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <?php 
                function tgl_indo($tanggal){
                  $bulan = array (
                    1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                  );
                  $pecahkan = explode('-', $tanggal);
                  
                 
                  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                }
                 ?>
                <table>
                  <tr>
                    <td style="padding-right: 20px">Nama Kelas</td><td>:</td><td style="padding-left: 10px">Silahkan pilih kelas</td>
                  </tr>
                  <tr>
                    <td>Tanggal</td><td>:</td><td style="padding-left: 10px"><?php echo tgl_indo(date('Y-m-d')); ?></td>
                  </tr>
                </table>
            </div>
          </div>

        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->

      </form>
    </div>
  </section>
</div>