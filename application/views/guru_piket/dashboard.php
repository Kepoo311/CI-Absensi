<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="alert alert-light alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-hand-paper"></i> Selamat datang <?= $this->session->userdata('nama'); ?>, di Web Absensi!</h5>
        Kamu login sebagai <?= $this->session->userdata('role'); ?>.
      </div>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $guru ?></h3>

              <p>Data Guru</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $gurupiket ?></h3>

              <p>Data Guru Piket</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $kelas ?></h3>

              <p>Kelas Sudah Absen</p>
            </div>
            <div class="icon">
              <i class="fas fa-table"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jadwal ?></h3>

              <p>Kelas Belum Absen</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->