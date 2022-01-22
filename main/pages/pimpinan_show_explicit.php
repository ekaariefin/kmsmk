<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_explicit.php');
$qexplicit = new explicit();
$explicit_id = $_GET['id'];
  if(!is_null($explicit_id))
  {
    $qexplicit_show = $qexplicit->explicit_detail($explicit_id);
  }
  else
  {
    header('location: my_explicit.php');
  }

  if(isset($_POST['reply_comment']))
  {
      date_default_timezone_set('Asia/Jakarta');
      $comment_date = date('d F Y H:i:s');
      $user_id = $_SESSION['user_id'];
      $explicit_id = $_GET['id'];
      $comment_desc = $_POST['comment_desc'];

      if($qexplicit->add_explicit_comment($comment_date, $user_id, $explicit_id, $comment_desc))
      {
        header('location:show_my_explicit.php?ex='.session_id().'&id='.$explicit_id.'');
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
    <section class="content-header" style="margin-bottom: -15px">
      <!-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Knowledge</h1>
          </div>
        </div>
      </div> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Detail explicit Knowledge</h3>
        </div>
        <div class="card-body">
          <div style="position: relative; float:right; margin-bottom: 10px">
          </div>
          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tbody>
              <tr>
                <td width="30%">ID Knowledge</td>
                <td><?php echo $qexplicit_show['explicit_id']; ?></td>
              </tr>
              <tr>
                <td>Tanggal Publish</td>
                <td><?php echo $qexplicit_show['explicit_date']; ?></td>
              </tr>
              <tr>
                <td>Penulis</td>
                <td><?php echo ucwords(strtolower($qexplicit_show['user_name'])); ?></td>
              </tr>
              <tr>
                <td>Judul Knowledge</td>
                <td><?php echo $qexplicit_show['explicit_name']; ?></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td><?php echo $qexplicit_show['mapel_name']; ?></td>
              </tr>
              <tr>
                <td colspan="2"><b><center>KETERANGAN</center></b></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo $qexplicit_show['explicit_desc']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <?php include 'included/footer.php'; ?>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
