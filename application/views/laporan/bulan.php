<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cetak Laporan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Laporan Bulan</li>
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
                <input id="" type="date" class="form-control" value="<?php  echo TODAY_DATE ?>" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input id="dateb" type="month" class="form-control" value="">
              </div>
            </div>      
          </div>
          <!-- /.row -->
        </div>
        <div class="card-footer">
          <form method="post" action="<?php echo site_url('laporan/exportToExcel'); ?>">
            <input id="hiddenMonth" type="hidden" name="bulan" value="">
            <button id="exportButton" type="submit" class="btn btn-primary" disabled>Export to Excel</button>
          </form>
        </div>
      </div>
      <div class="card card-default table-responsive" id="laporanBulan">
        <div class="container-fluid">
          <div style="text-align:center" class="card-header">
            <h3 class="card-title">Data Kehadiran Guru - <?= date('F'); ?></h3>
          </div>
          <br>
          <table id="tbllaporanBulan" style="border-collapse: collapse; width:100%" class="table table-hover table-bordered custom-td">
              <thead class="bg-info">
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
                  <td><?= $no++ ?></td>
                  <td ><?= $row->nama_guru ?></td>
                  <?php $absensi_data = $this->mlaporan->getAbsensiDataByMonth($bulan = date('m'), $row->nama_guru); ?>
                  <?php foreach ($absensi_data as $row): ?>
                  <td>
                  <?php 
                    $total_kehadiran = $row->total_hadir + $row->total_sakit + $row->total_izin + $row->total_alpa;

                    echo $total_kehadiran;
                  ?>
                  </td>
                  <td><?php echo $row->total_hadir; ?></td>
                  <td><?php echo $row->total_sakit; ?></td>
                  <td><?php echo $row->total_izin; ?></td>
                  <td><?php echo $row->total_alpa; ?></td>
                  <td>
                  <?php 
                    $total_kehadiran = $row->total_hadir + $row->total_sakit + $row->total_izin + $row->total_alpa;

                    if ($total_kehadiran > 0) {
                        $persentasi_kehadiran = ($row->total_hadir / $total_kehadiran) * 100;
                        echo $persentasi_kehadiran . '%';
                    } else {
                        echo '-';
                    } 
                  ?>
                
                  </td>
                  <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
          <br>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->