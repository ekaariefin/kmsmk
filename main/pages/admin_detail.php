<?php
session_start();
// error_reporting(0);
include_once('../system/sys_user.php');
$quser = new user();
$user_show = $quser->teacher_detail($_SESSION['user_id']);
$user_get = $quser->user_get_photo($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<?php
include 'included/head.php';
?>
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

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
              <h1>Akun Saya</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <?php
            if (isset($_GET['message'])) {
              if ($_GET['message'] == 'success_change_password') {
                echo '<div class="col-12">
              <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                  Password berhasil diubah! harap selalu ingat dan rahasikan password anda!
                </div>
            </div>';
              }
            }
            ?>
            <div class="col-6">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="files/user_photo/<?php echo $user_get['user_photo']; ?>" alt="User profile picture" style="width:120px; height:120px;margin-bottom: 10px">
                  </div>

                  <h3 class="profile-username text-center"><?php echo $_SESSION['user_name']; ?></h3>

                  <p class="text-muted text-center"><?php echo $user_show['user_role']; ?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Nomor ID</b> <a class="float-right"><?php echo $user_show['user_nip']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>NPSN</b> <a class="float-right"><?php echo $user_show['npsn']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Nama Sekolah</b> <a class="float-right"><?php echo $user_show['nama_sekolah']; ?></a>
                    </li>
                  </ul>
                  <a href="change_user_photo.php" type="button" class="btn btn-block btn-primary">Ganti Foto</a>
                  <a href="change_user_password.php?ex=<?php echo session_id() ?>" type="button" class="btn btn-block btn-primary">Ganti Password</a>
                </div>
              </div>
            </div>
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

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "searching": false,
      "ordering": false,
      "paging": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>