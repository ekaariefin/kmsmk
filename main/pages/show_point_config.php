<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_point.php');
$qpoint = new point();
$point_id = $_GET['pid'];
  if(!is_null($point_id))
  {
    $qpoint_show = $qpoint->point_detail($point_id);
  }
  else
  {
    header('location: point_config.php&ex='.session_id().'');
  }

  if(isset($_POST['editPointDetail'])){
    $point_id = $_POST['point_id'];
    $ex = $_POST['ex'];
    $point_score = $_POST['point_score'];
    if($qpoint->editPointDetail($point_id, $point_score)){
      header('location:point_config.php?&ex='.session_id().'');
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
          <h3 class="card-title">Detail Aktivitas Pengaturan Point</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
          <div style="position: relative; float:right; margin-bottom: 10px">
            <button type="submit" name="editPointDetail" class="btn btn-info" style="width: 150px"><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>
          </div>
          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tbody>
              <input type="hidden" name="point_id" value="<?php echo $qpoint_show['point_id']; ?>">
              <input type="hidden" name="ex" value="<?php echo session_id(); ?>">
              <tr>
                <td>ID Point</td>
                <td><?php echo $qpoint_show['point_id']; ?></td>
              </tr>
              <tr>
                <td>Judul Aktivitas</td>
                <td><?php echo $qpoint_show['point_name']; ?></td>
              </tr>
              <tr>
                <td>Jumlah Point</td>
                <td><input type="text" name="point_score" class="form-control" value="<?php echo $qpoint_show['point_score']; ?>"></td>
              </tr>
            </tbody>
          </table>
        </form>
          
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
