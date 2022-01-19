<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_point.php');
  include_once('../system/sys_user.php');
  include_once('security/session_check.php');
  $qpoint = new point();
  $quser = new user();
  $user_show = $quser->user_detail($_SESSION['user_id']);

  $qhistory = $qpoint->get_point_history($_SESSION['user_id']);
  $qhistory_penerimaan = $qpoint->get_history_penerimaan($_SESSION['user_id']);
  $qhistory_transfer = $qpoint->get_history_transfer($_SESSION['user_id']);
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
            <h1>Akun Saya</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Point Saya</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          Jumlah Point Saat Ini:<br/>
          <h2><?php echo $total_keseluruhan ?></h2>
          <small>Total Perolehan Point Sepanjang Masa : <b> <?php echo $total_point+$total_penerimaan ?> </b></small><br>
          <small>Perbanyak point dan tukarkan dengan item yang tersedia</small>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Riwayat Perolehan Point dari Aktivitas</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Tanggal</th>
                <th>Aktivitas</th>
                <th>Point</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                if($qhistory == "No Data"){
                  echo "";
                }
                else{
                foreach($qhistory as $row) {
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['trans_date']; ?></td>
                <td><?php echo $row['point_name']; ?></td>
                <td>(+) <?php echo $row['total_point']; ?></td>
              </tr>
              <?php
                }}
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Riwayat Perolehan Point dari Penerimaan Transfer Point</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Tanggal</th>
                <th>Pengirim</th>
                <th>Jumlah Point</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                if($qhistory_penerimaan == "No Data"){
                  echo "";
                }
                else{
                foreach($qhistory_penerimaan as $row) {
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['nama_pengirim']; ?></td>
                <td>(+) <?php echo $row['total_point']; ?></td>
              </tr>
              <?php
                }}
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Riwayat Pemotongan Point dikarenakan Transfer Point</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Tanggal</th>
                <th>Tujuan Pengiriman</th>
                <th>Jumlah Point</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                if($qhistory_transfer == "No Data"){
                  echo "";
                }
                else{
                foreach($qhistory_transfer as $row) {
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['tujuan']; ?></td>
                <td>(-) <?php echo $row['total_point']; ?></td>
              </tr>
              <?php
                }}
              ?>
            </tbody>
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

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>


<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example5').DataTable({
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