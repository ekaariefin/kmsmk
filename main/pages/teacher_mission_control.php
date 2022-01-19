<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  $quser = new user();
  $qother = new other();
?>
<!DOCTYPE html>
<html>
<?php 
  include 'included/head.php';
?>
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
            <h1>Mission Saya</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Control Panel</h3>
        </div>
        <div class="card-body">
          <a href="teacher_add_mission.php?ex=<?php echo session_id(); ?>" type="button" class="btn bg-gradient-primary"><i class="fas fa-user-cog" style="margin-right: 5px;"></i>Buat Mission Baru</a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Daftar Mission Yang Diterbitkan</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Nama Mission</center></th>
                  <th><center>Reward</center></th>
                  <th><center>Peserta</center></th>
                  <th><center>Expired Date</center></th>
                  <th><center>Action</center></th>                  
                </tr>
                </thead>
                <tbody>
                <?php
                  if($qother->show_mission_guru($_SESSION['user_id']) == "No Data"){
                   echo "<tr><td colspan='5'>Tidak ada yang ditampilkan</td></tr>";
                  }
                  else{
                    $no = 1;
                    $group = $qother->show_mission_guru($_SESSION['user_id']);
                    foreach($group as $row) {
                ?>
                <tr>
                  <td><center><?php echo $no++; ?></center></td>
                  <td><?php echo $row['mission_name']; ?></td>
                  <td><?php echo $row['mission_reward']; ?> Poin</td>
                  <td><center><?php echo $qother->count_mission_user($row['mission_id']) ?></center></td>
                  <td><center>
                    <?php 
                      $timestamp = strtotime($row['mission_expired']);
                      $new_date = date("d F Y", $timestamp);
                      echo $new_date; // Outputs: 31-03-2019
                    ?></center>
                  </td>
                  <td>
                    <center>
                      <a href="show_mission_detail.php?mid=<?php echo $row['mission_id'] ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-success"><i class="fas fa-external-link-alt" style="margin-right: 5px;"></i>Lihat</a>
                    </center>
                  </td>
                </tr>
                <?php
                  }}
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Nama Mission</center></th>
                  <th><center>Reward</center></th>
                  <th><center>Expired Date</center></th>
                  <th><center>Peserta</center></th>
                  <th><center>Action</center></th>        
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
    </section>
  </div>
  <?php include 'included/footer.php'; ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
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
</body>
</html>
