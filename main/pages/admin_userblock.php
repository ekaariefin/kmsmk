<?php
  session_start();
  error_reporting(0);
  include_once('../system/sys_user.php');
  $quser = new user();
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
            <h1>Panel Admin</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Siswa Yang Diblokir | Teknik Komputer dan Jaringan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Kelas</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $quser_list = $quser->user_block();
                    foreach($quser_list as $row) {
                  ?>
                  <tr>
                    <td width="40">
                      <center>
                        <img class="img-fluid img-circle" src="files/user_photo/<?php echo $row['user_photo']; ?>" style="width: 30px; height: 30px;"></td>
                      </center>
                    </td>
                    <td><center><?php echo $row['user_nip']; ?></center></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_gender']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                    <td><a href="admin_show_siswadetail.php?id=<?php echo $row['user_id']; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-block btn-sm btn-info">Detail</a></td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Kelas</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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