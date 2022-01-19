<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  $quser = new user();
  if(isset($_POST['addUser']))
  {
    $user_nip      = $_POST['user_nip'];
    $user_name    = $_POST['user_name'];
    $user_gender  = $_POST['user_gender'];
    $user_photo   = "blank.jpg";
    $npsn         = $_POST['npsn'];
    $user_role    = "Guru";
    $user_password  = md5($user_id);

    if($quser->add_new_user($user_nip, $user_name, $user_gender, $user_photo, $user_role, $npsn, $user_password)){
      header("location: admin_add_teacher.php?&message=Success");
    }
    else{
      header("location: admin_add_teacher.php?ex=&message=Gagal");
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
            <h1>Tambah Guru Baru</h1>
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
                      Selamat anda berhasil membuat Akun Guru Baru!
                    </div>';
            }
            else{
              echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>
                  Terjadi kesalahan saat menambahkan akun guru, harap coba lagi..
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
                    <label for="user_id">Nomor Induk Pegawai</label>
                    <input type="text" name="user_nip" class="form-control" autocomplete="off" placeholder="Masukkan Nomor Induk Pegawai / ID Pegawai..">
                  </div>

                  <div class="form-group">
                    <label for="user_id">Nomor Pokok Sekolah Nasional (NPSN)</label>
                    <input type="text" name="npsn" class="form-control" autocomplete="off" placeholder="Masukkan Nomor Pokok Sekolah Nasional atau NPSN" value="<?= $_SESSION['npsn_login']; ?>" readonly="readonly">
                  </div>

                  <div class="form-group">
                    <label for="user_name">Nama Lengkap</label>
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

                  <div class="callout callout-info">
                    <p>Informasi!</p>
                    <small>
                      <ol>
                        <li>Setelah ditambahkan, siswa dapat login dengan username: NIP dan password: NIP</li>
                        <li>Guru diharapkan dapat langsung mengupload foto profil agar dapat dikenali dalam sistem</li>
                        <li>Role akan secara otomatis diset sebagai Guru</li>
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


<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>