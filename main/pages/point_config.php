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
              <h1>Konfigurasi Point</h1>
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
                  <h3 class="card-title">Point Setting</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>
                          <center>No.</center>
                        </th>
                        <th>
                          <center>Nama Aktivitas</center>
                        </th>
                        <th>
                          <center>Jumlah Point</center>
                        </th>
                        <th>
                          <center>Aksi</center>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../system/sys_point.php";
                      $qpoint = new point();
                      if ($qpoint->list_point_config() == "No Data") {
                        echo "<tr><td colspan='5'>Tidak ada yang ditampilkan</td></tr>";
                      } else {
                        $no = 1;
                        $list_point = $qpoint->list_point_config();
                        foreach ($list_point as $row) {
                      ?>
                          <tr>
                            <td width="10%">
                              <center><?php echo $no++; ?></center>
                            </td>
                            <td><?php echo $row['point_name']; ?></td>
                            <td><?php echo $row['point_score']; ?></td>
                            <td>
                              <center>
                                <a href="show_point_config.php?pid=<?php echo $row['point_id'] ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-sm btn-success"><i class="fas fa-edit" style="margin-right: 5px;"></i>Ubah</a>
                              </center>
                            </td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>
                          <center>No.</center>
                        </th>
                        <th>
                          <center>Nama Aktivitas</center>
                        </th>
                        <th>
                          <center>Jumlah Point</center>
                        </th>
                        <th>
                          <center>Aksi</center>
                        </th>
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
    $(function() {
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