<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
$quser = new user();
$uid = $_GET['id'];
$user_show = $quser->guru_detail($uid);

if (isset($_GET['delUser']))
{
  if($quser->guru_delete($_GET['delUser'])){
    header('location:admin_gurulist.php?ex='.session_id().'');
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
          <h3 class="card-title">Informasi Tentang Guru/Pegawai</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <div style="position: relative; float:right; margin-bottom: 10px">
                  <a href="admin_edit_gurudetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-sm btn-info" style="width: 90px"><i class="far fa-edit" style="margin-right: 5px"></i> Edit</a>
                  <a href="admin_show_gurudetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>&delUser=<?php echo $uid; ?>" type="button" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini ?')" style="width: 100px"><i class="far fa-trash-alt" style="margin-right: 5px"></i> Delete</a>
                  </a>
                </div>
              </tr>
              <tr>
                <td rowspan="5" style="width: 20%"><img src="files/user_photo/<?php echo $user_show['user_photo']; ?>" style="width: 160px; height: 200px"></td>
              <tr>
                <td style="width: 30%;">Nomor Induk Pegawai</td>
                <td style="width: 50%;"><?php echo $user_show['user_id']; ?></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td><?php echo $user_show['user_name']; ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td><?php echo $user_show['user_gender']; ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><?php echo $user_show['user_role']; ?></td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="3"><center><b>BIDANG STUDI/MATA PELAJARAN</b></center></td>
              </tr>
              <tr>
                <td><b><center>NO.</center></b></td>
                <td><b><center>KODE MAPEL</center></b></td>
                <td><b><center>NAMA MAPEL</center></b></td>
              </tr>
              <?php
                if($quser->get_guru_mapel($user_show['user_id']) == "No Data"){
                 echo "<tr><td colspan='3'>Belum ada Mata Pelajaran yang diajarkan!</td></tr>";
                }
                else{
                  $no = 1;
                  $qgurumk = $quser->get_guru_mapel($user_show['user_id']);
                  foreach($qgurumk as $mk) {
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $mk['mapel_id']; ?></center></td>
                <td><?php echo $mk['mapel_name']; ?></td>
              </tr>
              <?php
                }
              }
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
