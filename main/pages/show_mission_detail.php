<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_other.php');
$qother = new other();
$mid = $_GET['mid'];
$mission_show = $qother->mission_detail($mid);
if(isset($_GET['action'])){
  if($_GET['action'] = "Approve"){
    $student = $_GET['Student'];
    $user_id = $_SESSION['user_id'];
    $mid = $_GET['mid'];
    $send_point = $mission_show['mission_reward'];
    if($qother->mission_approve_file($mid,$student,$user_id)){
      $qother->mission_approve_sendpoint($mid,$student,$send_point,$user_id);
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Berkas Siswa berhasil disetujui! Siswa telah berhasil mendapatkan point dari hadiah mission');
            window.location.href='#';
            </script>");
  }
  else{
    "Gagal";
  }
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
      <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Informasi Detail Tentang Misi</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td width="30%">Nama Misi</td>
                <td><?php echo $mission_show['mission_name']; ?></td>
              </tr>
              <tr>
                <td>Target Pencapain</td>
                <td><?php echo $mission_show['mission_target']; ?></td>
              </tr>
              <tr>
                <td>Total Reward (Tentativ)</td>
                <td><?php echo $mission_show['mission_reward']; ?></td>
              </tr>
              <tr>
                <td>Jumlah Siswa</td>
                <td>
                  <?php
                     echo $qother->count_mission_user($mission_show['mission_id'])
                  ?>
                </td>
              </tr>
              <tr>
                <td>Expired Date</td>
                <td><?php echo $mission_show['mission_expired']; ?></td>
                </td>
              </tr>
              <tr>
                <td>Penugasan</td>
                <td>
                  <?php echo $mission_show['mission_task']; ?>
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="6"><center><b>SISWA YANG TERGABUNG PADA MISI</b></center></td>
              </tr>
              <tr>
                <td><b><center>No.</center></b></td>
                <td><b><center></center></b></td>
                <td><b>Nama Siswa</b></td>
                <td><b>Kelas</b></td>
                <td><b>Progress</b></td>
                <td><b>Status</b></td>
              </tr>
              <?php
                if($qother->get_mission_member($mid) == "No Data"){
                 echo "<tr><td colspan='6'>Belum ada yang bergabung!</td></tr>";
                }
                else{
                  $no = 1;
                  $qmember = $qother->get_mission_member($mid);
                  foreach($qmember as $member) {
                    $student = $member['user_id'];
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td>
                  <center>
                    <img class="img-fluid img-circle" src="files/user_photo/<?php echo $member['user_photo']; ?>" style="width: 30px; height: 30px;"></td>
                  </center>
                </td>
                <td><?php echo $member['user_name']; ?></td>
                <td><?php echo $member['class_name']; ?></td>
                <td>
                  <?php
                    $mission_show_progress = $qother->count_kontribusi($mid,$student);
                    echo $mission_show_progress['total_kontribusi']; ?> / <?php echo $mission_show['mission_target'] ?></td>
                <td>
                  <?php
                    if($mission_show_progress['total_kontribusi'] < $mission_show['mission_target']){
                      echo "Belum Selesai";
                    }
                    else {
                      echo "Selesai";
                    }
                  ?>
                </td>
              </tr>
              <?php
                }}
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
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
