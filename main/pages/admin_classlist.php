<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_sekolah.php');
  include_once('../system/sys_user.php');
  $qsekolah = new sekolah();
  $class_list = $qsekolah->class_list($_SESSION['npsn_login']);

  if(isset($_POST['save_edit_class']))
  {
    $class_id      = $_POST['class_id'];
    $class_grade   = $_POST['class_grade'];
    $class_name    = $_POST['class_name'];
    if($qsekolah->class_edit($class_id, $class_grade, $class_name)){
        header('location: admin_classlist.php?ex='.session_id());
    }
    else{
      header('location: admin_classlist.php?ex='.session_id());
    }
  }

  if(isset($_GET['action'])){
    if($_GET['action'] =='delete'){
      $class_id = $_GET['id'];
      $qsekolah->delete_class($class_id);
      echo ("<script LANGUAGE='JavaScript'>
            window.alert('Berhasil Menghapus Kelas!');
            window.location.href='admin_classlist.php?ex".session_id()."';
            </script>");
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
                    <th width="20%">No</th>
                    <th width="20%">Grade</th>
                    <th width="40%">Nama Kelas</th>
                    <th width="20%">Aksi</th>                  
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
                      <!-- Button trigger modal -->
                      <a data-toggle="modal" data-target="#editKelas<?= $row['class_id'];?>" type="button" class="btn btn-sm btn-success" style=" color:white;"><i class="far fa-edit" style="margin-right: 5px"></i> Edit</a>
                      <a href="admin_classlist.php?id=<?php echo $row['class_id']; ?>&action=delete&ex=<?php echo session_id() ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash" aria-hidden="true" style="margin-right: 5px"></i>Delete</a></center>
                    </td>
                  </tr>
                    <!-- Modal -->
                  <div class="modal fade" id="editKelas<?= $row['class_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form action="" method="POST">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <?php 
                            $class_detail = $qsekolah->class_detail($row['class_id']);
                          ?>
                            <div class="form-group row">
                              <label for="grade" class="col-sm-3 col-form-label">Grade</label>
                              <div class="col-sm-9">
                                <input type="text" hidden value="<?= $class_detail['class_id'] ?>" name="class_id">
                                <input type="text" class="form-control-plaintext" id="grade" value="<?= $class_detail['class_grade'] ?>" name="class_grade">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="name_class" class="col-sm-3 col-form-label">Nama Kelas</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="name_class" value="<?= $class_detail['class_name'] ?>" name="class_name">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="save_edit_class" class="btn btn-success" ><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>   
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <?php
                    }
                  }
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