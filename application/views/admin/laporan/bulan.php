<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Guru</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Pilih Bulan</h3>

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
                <input id="" type="date" class="form-control" value="<?php  echo date('Y-m-d') ?>" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input id="dateb" type="month" class="form-control" value="<?php  echo date('Y-m') ?>">
              </div>
            </div>      
          </div>
          <!-- /.row -->
        </div>
        <div class="card-footer">
          <a href="<?php echo site_url('laporan/exportToExcel'); ?>" class="btn btn-primary">Export to Excel</a>
        </div>
      </div>
      <div class="card card-default" id="daftar">
        <div class="container-fluid">
          <div style="text-align:center" class="card-header">
            <h3 class="card-title">Data Kehadiran Guru</h3>
          </div>
          <br>
          <div class="table-responsive">
            <table  id="laporanBulan" style="border-collapse: collapse; width:100%" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align : middle; text-align: center; width: 10px;">No</th>
                    <th rowspan="2" style="vertical-align : middle; text-align: center;">Nama</th>
                    <th rowspan="2" style="vertical-align : middle; text-align: center; width: 10px;">Jumlah Masuk Kelas</th>
                    <th colspan="4" style="vertical-align : middle; text-align: center;">Rekap Absensi</th>
                    <th rowspan="2" style="vertical-align : middle; text-align: center;  width: 20px;">Persentase Kehadiran</th>
                  </tr>
                  <tr>
                      <th>H</th>
                      <th>S</th>
                      <th>I</th>
                      <th>A</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php 
                      $guru = $this->mlaporan->get_data_guru();
                      foreach ($guru as $row): 
                  ?>
                  <tr>
                    <td style="vertical-align : middle; text-align: center;"><?= $no++ ?></td>
                    <td ><?= $row->nama_guru ?></td>
                    <td style="vertical-align : middle; text-align: center;">5</td>
                    <?php $absensi_data = $this->mlaporan->getAbsensiDataByMonth($bulan = date('m'), $row->nama_guru); ?>
                    <?php foreach ($absensi_data as $row): ?>
                    <td style="vertical-align : middle; text-align: center;"><?php echo $row->total_hadir; ?></td>
                    <td style="vertical-align : middle; text-align: center;"><?php echo $row->total_sakit; ?></td>
                    <td style="vertical-align : middle; text-align: center;"><?php echo $row->total_izin; ?></td>
                    <td style="vertical-align : middle; text-align: center;"><?php echo $row->total_alpa; ?></td>
                    <td style="vertical-align : middle; text-align: center;">50%</td>
                    <?php endforeach; ?>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->