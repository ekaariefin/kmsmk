<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  include_once('../system/sys_explicit.php');
  include_once('../system/sys_other.php');
  $qmp = new other();
  $qmp_list = $qmp->mp_list($_SESSION['npsn_login']);

  $qexplicit = new explicit();
  if(isset($_GET['mpid'])){
    $qexplicit_list = $qexplicit->my_explicit_list_select_mp($_GET['mpid'], $_SESSION['user_id']);
  }
  else{
    $qexplicit_list = $qexplicit->my_explicit_list($_SESSION['user_id']);
  }
?>

<!DOCTYPE html>
<html>
<?php include 'included/head.php'; ?>
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
    include 'included/navbar.php';
    include 'included/sidebar.php';
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Explicit Knowledge</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori Pengetahuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <a href="my_explicit.php?ex=<?php echo session_id() ?>" type="button" class="btn btn-success" style="margin-bottom: 5px; margin-right: 5px; margin-top: 5px; margin-left: 5px;"><i class="fas fa-tags" style="margin-right: 5px;"></i>Seluruh Kategori</a>

                <?php
                  foreach($qmp_list as $mp) {
                ?>

                <a href="my_explicit.php?mpid=<?php echo $mp['mapel_id']; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-primary" style="margin-bottom: 5px; margin-right: 5px; margin-top: 5px; margin-left: 5px;"><i class="fas fa-tags" style="margin-right: 5px;"></i><?php echo $mp['mapel_name']; ?></a>

                <?php
                  }
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pengetahuan Explicit Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="margin-bottom: 10px">
                  <a href="add_explicit_teacher.php" class="btn btn-block btn-primary" style="width: 200px">
                    <i class="fa fa-plus" style="margin-right: 10px;"></i>Tambah Knowledge
                  </a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Publish Date</th>
                    <th>Judul Knowledge</th>
                    <th>Status</th>
                    <th>Point</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    if ($qexplicit_list == "No Data"){
                      echo "";
                    }
                    else {
                    foreach($qexplicit_list as $row) {
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['explicit_date']; ?></td>
                    <td><?php echo $row['explicit_name']; ?></td>
                    <td><?php echo $row['explicit_status']; ?></td>
                    <td>+5</td>
                    <td><a href="show_my_explicit.php?id=<?php echo $row['explicit_id']; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-sm btn-block btn-info"><i class="fas fa-info-circle"></i> Detail</a></td>
                  </tr>
                  <?php
                    }
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th>Publish Date</th>
                    <th>Judul Knowledge</th>
                    <th>Status</th>
                    <th>Point</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
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