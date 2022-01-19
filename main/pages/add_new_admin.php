<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_sekolah.php');
  $quser = new user();
  $qsekolah = new sekolah();
  $npsn = $_GET['npsn'];
  $qsekolah_detail = $qsekolah->school_detail($npsn);
  $adminid = $_SESSION['user_id'];
  if(isset($_POST['addUser']))
  {
    $npsn           = $_POST['npsn'];
    $user_id        = $_POST['user_id'];
    $user_name      = $_POST['user_name'];
    $user_gender    = $_POST['user_gender'];
    $npsn           = $_POST['npsn'];
    $user_photo     = "blank.jpg";
    $user_role      = "Admin";
    $user_password  = md5($user_id);

    if($quser->add_new_user($user_id, $user_name, $user_gender, $user_photo, $user_role, $npsn, $user_password)){
      header("location: detail_sekolah.php?npsn=".$npsn."&ex=".session_id()."&message=Success");
      }
    else{
      header("location: add_new_admin.php?npsn=".$npsn."ex=".session_id()."&message=Gagal");
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
            <h1>Tambah Admin Baru</h1>
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
                      Selamat anda berhasil menambahkan Akun Siswa Baru!
                    </div>';
            }
            else{
              echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>
                  Terjadi kesalahan saat menambahkan Akun Siswa, harap coba lagi..
                </div>';
            }
          }
          ?>
        <div class="row">
          <div class="col-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulir Penambahan Admin Baru</h3>
              </div>

              <form action="" method="POST">

                <div class="card-body">
                  <div class="form-group">
                    <label for="user_id">NPSN Sekolah</label>
                    <input type="text" name="npsn" class="form-control" autocomplete="off" value="<?= $_GET['npsn']; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="user_name">Nama Sekolah</label>
                    <input type="text" name="" class="form-control" value="<?= $qsekolah_detail['nama_sekolah']; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="user_name">NIP/ID Pegawai/NIPUS</label>
                    <input type="text" name="user_id" class="form-control" autocomplete="off" placeholder="Masukkan NIP/NIPUS/ID">
                  </div>

                  <div class="form-group">
                    <label for="user_name">Nama Administrator</label>
                    <input type="text" name="user_name" class="form-control" autocomplete="off" placeholder="Masukkan Nama Lengkap..">
                  </div>

                  <div class="form-group">
                    <label for="user_gender">Jenis Kelamin</label>
                    <select class="form-control" name="user_gender">
                      <option disabled readonly selected>-- Pilih Jenis Kelamin --</option>
                      <option value="Laki - Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="user_name">Username</label>
                    <small>Otomatis menggunakan NIP/ID Pegawai/NIPUS</small>
                  </div>

                  <div class="form-group">
                    <label for="user_name">Password</label>
                    <small>Otomatis menggunakan NIP/ID Pegawai/NIPUS</small>
                  </div>
                  
                  <div class="callout callout-info">
                    <p>Informasi!</p>
                    <small>
                      <ol>
                        <li>Setelah ditambahkan, siswa dapat login dengan username: NIP/NIPUS dan password: NIP/NIPUS</li>
                        <li>Admin diharapkan dapat langsung mengupload foto profil agar dapat dikenali dalam sistem</li>
                        <li>Role akan secara otomatis diset sebagai Admin Sekolah yang didaftarkan</li>
                    </small>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" name="addUser" class="btn btn-primary">Daftarkan Akun</button>
                </div>

              </form>
            </div>
    </section>
    <!-- /.content -->
  </div>
  
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

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>