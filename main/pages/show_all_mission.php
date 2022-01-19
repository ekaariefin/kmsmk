<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  $qother = new other();
  $mission_list = $qother->mission_list();

  if (isset($_GET['action']) == "join"){
    if($qother->join_mission($_GET['mid'], $_SESSION['user_id'])){
      $qother->join_mission_progress($_GET['mid'], $_SESSION['user_id']);
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Berhasil Bergabung dengan grup!');
            window.location.href='my_missions.php?ex=".session_id()."';
            </script>";
    }
    else{
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Terjadi kesalahan saat bergabung atau anda telah bergabung sebelumnya!');
            window.location.href='my_missions.php?ex=".session_id()."';
            </script>";
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
            <h1>Misi Tersedia</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Daftar Mission Yang Tersedia</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10%">No</th>
                    <th>Nama Mission</th>
                    <th width="15%">Reward</th>
                    <th>Tugas</th>
                    <th width="15%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($mission_list as $row) {
                      $mission_id = $row['mission_id'];
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['mission_name']; ?></td>
                    <td><?php echo $row['mission_reward']; ?> Poin</td>
                    <td><?php echo $row['mission_task']; ?></td>
                    <td>
                      <?php
                        if($qother->check_join($row['mission_id'], $_SESSION['user_id']) != 0){
                          echo '<button type="button" class="btn btn-info" disabled><i class="fas fa-paper-plane" style="margin-right: 5px;"></i>Join</a>';
                        }
                        else{
                          echo '<a href="show_all_mission.php?mid='.$mission_id.'&ex='.session_id().'&action=join" type="button" class="btn btn-info"><i class="fas fa-paper-plane" style="margin-right: 5px;"></i>Join</a>';
                        }
                      ?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Mission</th>
                    <th>Reward</th>
                    <th>Tugas</th>
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
      "ordering": false,
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