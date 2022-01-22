<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_point.php');
  include_once('../system/sys_user.php');
  include_once('security/session_check.php');
  $qpoint = new point();
  $quser = new user();
  $qhistory = $qpoint->show_badges();
  $user_show = $quser->user_detail($_SESSION['user_id']);

  $total_point =  $qpoint->count_mypoint($_SESSION['user_id']);
  $total_belanja =  $qpoint->count_shopping($_SESSION['user_id']);
  $total_transfer = $qpoint->count_transfer($_SESSION['user_id']);
  $total_penerimaan = $qpoint->count_penerimaan($_SESSION['user_id']);
  $total_keseluruhan =  $qpoint->count_total($total_point, $total_belanja, $total_transfer, $total_penerimaan);

  if (isset($_POST['transfer'])){
    $receiver = $_POST['receiver'];
    $total_transfer = $_POST['total_transfer'];
    $current_user = $_SESSION['user_id'];

    $catch_receiver_id = $quser->catch_userid($receiver);
    foreach($catch_receiver_id as $row) {
          $receiver_id = $row['user_id'];
      }

    if($qpoint->transferpoint($current_user, $total_transfer, $receiver_id)){
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Proses Transfer telah berhasil diverifikasi!');
            window.location.href='my_point_transfer.php?ex=".session_id()." '
            </script>";
    }
    else{
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Terjadi kesalahan saat transfer point!');
            window.location.href='my_point_transfer.php?ex=".session_id()." '
            </script>";
    }
  }
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
            <h1>Transfer Point</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Point Saya</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          Jumlah Point Saat Ini:<br/>
          <h2><?php echo $total_keseluruhan ?></h2>
          <small>Total Perolehan Point : <b> <?php echo $total_keseluruhan ?></b></small><br>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Transfer Point</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <form action="" method="POST">
        <div class="card-body">
          <div style="margin-bottom: 10px">
            Masukkan NIS/Email/Username yang menjadi tujuan transfer
            <input type="text" class="form-control" name="receiver" autocomplete="off">
          </div>
          <div style="margin-bottom: 10px">
            Jumlah Point
            <input type="text" class="form-control" name="total_transfer" autocomplete="off" onchange="handleChange(this);">
            <small>Point saat ini : <b> <?php echo $total_keseluruhan ?></b></small>
          </div>
          <div style="margin-bottom: 10px">
            <button type="submit" name="transfer" class="btn btn-sm btn-primary" onclick="return confirm('Apakah anda yakin ingin melakukan transfer poin? Point anda akan berkurang saat proses berhasil')">
              <i class="fas fa-paper-plane"></i>⠀Transfer Point
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'included/footer.php'; ?>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
<script>
  function handleChange(input) {
    if (input.value < 0) input.value = 0;
    var total = <?php echo $total_keseluruhan; ?>; 
    if (input.value > total) input.value = total;
  }
</script>
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