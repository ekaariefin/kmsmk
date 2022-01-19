<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_mapel.php');
  $quser = new user();
  $qmapel = new mapel();
  
  if(isset($_POST['addMapel']))
  {
    $mapel_name    = $_POST['mapel_name'];
    $mapel_desc    = $_POST['mapel_desc'];
    $npsn          = $_SESSION['npsn_login'];
    if($qmapel->add_new_mapel($mapel_name, $mapel_desc, $npsn)){
      header("location: admin_add_mapel.php?&message=Success");
    }
    else{
      header("location: admin_add_mapel.php?ex=&message=Gagal");
    }
  }

  
?>
<!DOCTYPE html>
<html>
  <?php include 'included/head.php'; ?>  
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">

  <?php 
    include 'included/navbar.php';
    include 'included/sidebar.php';
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Mata Pelajaran Baru</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
          if(isset($_GET['message'])){
            if($_GET['message'] == 'Success'){
              echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                      Selamat anda berhasil menambahkan Mata Pelajaran Baru!
                    </div>';
            }
            else{
              echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>
                  Terjadi kesalahan saat menambahkan Mata Pelajaran, harap coba lagi..
                </div>';
            }
          }
          ?>
        <div class="row">
          <div class="col-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulir Penambahan Guru Baru</h3>
              </div>

              <form action="" method="POST">

                <div class="card-body">
                  <div class="form-group">
                    <label for="mapel_name">Nama Mata Pelajaran</label>
                    <input type="text" name="mapel_name" class="form-control" autocomplete="off" placeholder="Masukkan Judul Mata Pelajaran..">
                  </div>

                  <div class="form-group">
                    <label for="mapel_desc">Deskripsi Mata Pelajaran</label>
                    <input type="text" name="mapel_desc" class="form-control" autocomplete="off" placeholder="Deskripsi Mata Pelajaran..">
                  </div>

                  <div class="callout callout-info">
                    <p>Informasi!</p>
                    <small>
                      <ol>
                        <li>Setelah menambahkan Mata Pelajaran baru harap menambahkan Tenaga Pengajar pada Akun Guru yang bersangkutan</li>
                        <li>Setelah mata pelajaran baru diterbitkan, maka siswa akan dapat mengisi tacit knowledge dan explicit knowledge pada mata pelajaran yang ditambahkan</li>
                      </ol>
                    </small>
                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" name="addMapel" class="btn btn-primary">Proses Entry</button>
                </div>

              </form>
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'included/footer.php'; ?>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>