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
            <h1>Group</h1>
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
              <h3 class="card-title">Daftar Seluruh Grup Yang Berjalan</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Group Name</center></th>
                  <th><center>Topics</center></th>
                  <th><center>Total Member</center></th>
                  <th><center>Action</center></th>                  
                </tr>
                </thead>
                <tbody>
                <?php
                  if($qother->show_group_all($_SESSION['npsn_login']) == "No Data"){
                   echo "<tr><td colspan='5'>Tidak ada yang ditampilkan</td></tr>";
                  }
                  else{
                    $no = 1;
                    $group = $qother->show_group_all($_SESSION['npsn_login']);
                    foreach($group as $row) {
                ?>
                <tr>
                  <td><center><?php echo $no++; ?></center></td>
                  <td><?php echo $row['group_name']; ?></td>
                  <td><?php echo $row['group_topic']; ?></td>
                  <td><center><?php echo $qother->count_group_user($row['group_id']) ?></center></td>
                  <td>
                    <center>
                      <a href="show_group_detail.php?gid=<?php echo $row['group_id'] ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-block btn-success"><i class="fas fa-external-link-square-alt"></i>  Lihat Grup</a>
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
                  <th><center>Group Name</center></th>
                  <th><center>Topics</center></th>
                  <th><center>Total Member</center></th>
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
