<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_other.php');
$qother = new other();
$mid = $_GET['mid'];
$mission_show = $qother->mission_detail($mid);

if (isset($_POST['collect'])){
  $mission_id = $_POST['mission_id'];
  $user_id = $_SESSION['user_id'];

  // proses terhadap file yang diupload
  $temp = $_FILES['user_file']['tmp_name'];
  $user_file = rand(0,9999).$_FILES['user_file']['name'];
  $size = $_FILES['user_file']['size'];
  $type = $_FILES['user_file']['type'];
  $folder = "files/mission/";

  // pengecekan ukuran file (maksimal 2mb)
  if ($size < 2048000){
    move_uploaded_file($temp,$folder.$user_file);
    if($qother->mission_upload_file($mission_id,$user_id,$user_file))
    {
      header('location:my_missions.php?ex='.session_id().'');
    }
  }else{
    echo "<b>Gagal Upload</b>";
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
  <div class="content-wrapper">
    <section class="content-header" style="margin-bottom: -15px">
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Collect Mission Assignments</h3>
        </div>
        <div class="card-body">
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Informasi!</h5>
            Pengumpulan hanya dapat dilakukan 1x, harap pastikan file yang di upload sudah benar dan sesuai!
          </div>
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td width="30%">Nama Misi</td>
                <td><?php echo $mission_show['mission_name']; ?></td>
              </tr>
              <tr>
                <td>Total Reward (Tentativ)</td>
                <td><?php echo $mission_show['mission_reward']; ?></td>
              </tr>
              <tr>
                <td>Penugasan</td>
                <td>
                  <?php echo $mission_show['mission_task']; ?>
                </td>
              </tr>
              <?php
                $assignment = $qother->assignment_detail($mission_show['mission_id'],$_SESSION['user_id']);
                if(empty($assignment['user_file'])){
                  include "my_mission_collect_upload.php";
                }
                else{
                  echo "<tr>
                        <td></td>
                        <td colspan='2'>
                          Anda sudah mengumpulkan tugas ini! harap hubungi pembina misi, Apabila terdapat perubahan/perbaikan
                        </td>
                      </tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </tr>

    </section>
  </div>

  <?php include 'included/footer.php'; ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
