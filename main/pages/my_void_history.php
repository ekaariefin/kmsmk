<?php
  session_start();
  include_once('security/session_check.php');
  include_once('../system/sys_point.php');
  include_once('../system/sys_user.php');
  $qpoint = new point();
  $quser = new user();
  $user_show = $quser->user_detail($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
  <?php include 'included/head.php'; ?>
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
            <h1>Void History</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

    <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Riwayat Loss Point</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
            VOID Point dapat terjadi apabila ditemukan pelanggaran seperti Plagiat, Pengetahuan tidak sesuai, mengandung unsur SARA dan sebagainya sesuai kebijakan kurikulum dan silabus mata pelajaran
          </div>
          <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th><center>Tanggal</center></th>
              <th><center>Aktivitas</center></th>
              <th><center>Jumlah Point</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 1;
                $qhistory = $qpoint->show_void_point($_SESSION['user_id']);
                if($qhistory == "No Data"){
                  echo "<td colspan='4'>Tidak ada data yang ditampilkan</td>";
                }
                else{
                foreach($qhistory as $row) {
            ?>
            <tr>
              <td>1.</td>
              <td><?php echo $row['trans_date']; ?></td></td>
              <td><?php echo $row['point_name']; ?></td>
              <td><center><?php echo $row['point_score']; ?></center></td>
            </tr>
            <?php
              }}
            ?>
          </tbody>
        </table>
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
