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
          <h3 class="card-title">Import From Excel</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>
            
          </form>
          <!-- /.row -->
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Guru</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tabelGuru" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($guru as $row) { ?>
              <tr>
                  <td><?php echo $row->id_guru; ?></td>
                  <td><?php echo $row->nama_guru; ?></td>
                  <td>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm btn-del">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->