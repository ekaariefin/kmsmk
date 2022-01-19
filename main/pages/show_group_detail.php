<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_other.php');
$qother = new other();
$gid = $_GET['gid'];
$group_show = $qother->group_detail($gid);
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
          <h3 class="card-title">Informasi Tentang Grup yang Saya Ikuti</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td style="width: 30%;">Group Code</td>
                <td style="width: 50%;"><?php echo $group_show['group_code']; ?></td>
              </tr>
              <tr>
                <td>Nama Grup</td>
                <td><?php echo $group_show['group_name']; ?></td>
              </tr>
              <tr>
                <td>Topic</td>
                <td><?php echo $group_show['group_topic']; ?></td>
              </tr>
              <tr>
                <td>Jumlah Siswa</td>
                <td>
                  <?php
                     echo $qother->count_group_user($group_show['group_id'])
                  ?>
                </td>
              </tr>
              <tr>
                <td>Penugasan</td>
                <td>
                  <?php echo $group_show['group_task']; ?>
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="4"><center><b>SISWA YANG TERGABUNG DI GRUP</b></center></td>
              </tr>
              <tr>
                <td><b><center>No.</center></b></td>
                <td><b><center></center></b></td>
                <td><b>Nama Siswa</b></td>
                <td><b>Kelas</b></td>
              </tr>
              <?php
                if($qother->get_group_member($gid) == "No Data"){
                 echo "<tr><td colspan='4'>Belum ada yang bergabung!</td></tr>";
                }
                else{
                  $no = 1;
                  $qmember = $qother->get_group_member($gid);
                  foreach($qmember as $member) {
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
              </tr>
              <?php
                }}
              ?>
            </tbody>
          </table>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </tr>

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
