<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');

  $qother = new other();
  if(isset($_POST['addGroup']))
  {
      $group_name   = $_POST['group_name'];
      $group_code   = $_POST['group_code'];
      $group_topic  = $_POST['group_topic'];
      $group_task   = $_POST['group_task'];
      $pembina      = $_SESSION['user_id'];
      if($qother->new_group($group_name, $group_code, $group_topic, $group_task, $pembina))
      {
        header('location:teacher_group_control.php?ex='.session_id().'');
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
            <h1>Grup</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Grup Baru</h3>
              </div>

              <form action="" method="POST">

                <div class="card-body">

                  <div class="form-group">
                    <label for="tacit_name">Judul Grup</label>
                    <input type="text" name="group_name" class="form-control" autocomplete="off" placeholder="Judul Grup">
                  </div>

                  <div class="form-group">
                    <label for="tacit_name">Buat Kode Unik Grup</label>
                    <input type="text" name="group_code" class="form-control" autocomplete="off" placeholder="Contoh: JSDH10 / HSA201 / XX931 / DYA30">
                  </div>

                  <div class="form-group">
                    <label for="tacit_name">Topik</label>
                    <input type="text" name="group_topic" class="form-control" autocomplete="off" placeholder="Judul Topik dan Nama Kelas">
                  </div>

                  <div class="form-group">
                    <label for="tacit_desc">Penugasan</label>
                    <textarea name="group_task" class="textarea"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    </textarea>
                  </div>

                  <div class="callout callout-info">
                    <small>Setelah berhasil membuat grup, siswa dapat masuk menggunakan Kode Unik yang dibuat!</small>
                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" name="addGroup" class="btn btn-primary">Proses Grup Baru</button>
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