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
      
      <button type="button" style="display: none" id="tombol-cetak" class="btn btn-success btn-flat" onclick="printJS('daftar', 'html')"><i class="fas fa-print"></i>
        Cetak
      </button><br>

      <?php foreach ($kelas as $row): ?>
      <div class="card card-default" id="daftar">
        <div class="container-fluid">
          <div style="text-align:center" class="card-header">
            <h3 class="card-title"><?= $row->kelas ?></h3>
          </div>
          <br>
          <div class="table-responsive">
            <table border="all" style="border-collapse: collapse;" class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px;">No</th>
                  <th style="width: 500px;">Nama</th>
                  <th style="width: 150px;">Absensi</th>
                  <th style="width: 250px;">Keterangan Lain</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php 
                    $absensi_kelas = $this->mlaporan->absensi_hari_ini($row->kelas);
                    foreach ($absensi_kelas as $laporan): 
                ?>
                <tr>
                  <td ><?= $no++ ?></td>
                  <td ><?= $laporan->nama_guru ?></td>
                  <td ><?= $laporan->status_absen ?></td>
                  <td ><?= $laporan->keterangan ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <br>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->