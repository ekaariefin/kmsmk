<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_sekolah.php');
  include_once('../system/sys_user.php');
  $qsekolah = new sekolah();
  $class_list = $qsekolah->class_list($_SESSION['npsn_login']);

  if(isset($_GET['action'])){
    if($_GET['action'] =='delete'){
      $class_id = $_GET['id'];
      $qsekolah->delete_class($class_id);
    }
  }
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
                <h3 class="card-title">Daftar Kelas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Grade</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    if($class_list == "No Data"){
                      echo "<tr><td colspan='4'><center>Belum ada data</center></td></tr>";
                    }
                    else{
                    foreach($class_list as $row) {
                  ?>
                  <tr>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><center><?php echo $row['class_grade']; ?></center></td>
                    <td><?php echo $row['class_name']; ?></td>
                    </td>
                    <td><center>
                        <a href="admin_classlist.php?id=<?php echo $row['class_id']; ?>&action=delete&ex=<?php echo session_id() ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash" aria-hidden="true" style="margin-right: 5px"></i>Delete</a></center>
                    </td>
                  </tr>
                  <?php
                    }}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>No</th>
                    <th>Grade</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>       
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