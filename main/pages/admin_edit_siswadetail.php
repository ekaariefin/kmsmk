<?php
session_start();
error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
$quser = new user();
$uid = $_GET['id'];
$user_show = $quser->user_detail($uid);

if(isset($_POST['save_edit_siswa']))
  {
      $user_id = $_POST['user_id'];
      $user_name = $_POST['user_name'];
      $user_gender = $_POST['user_gender'];
      $user_role = $_POST['user_role'];

      if($quser->edit_user($user_id, $user_name, $user_gender, $user_role))
      {
        header('location:admin_show_siswadetail.php?id='.$uid.'&ex='.session_id().'');
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
          <h3 class="card-title">Informasi Tentang Siswa</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <form action="" method="POST">
            <tbody>
              <tr>
                <div style="position: relative; float:right; margin-bottom: 10px">
                  <button type="submit" name="save_edit_siswa" class="btn btn-sm btn-success" style="width: 90px"><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>
                </div>
              </tr>
              <tr>
                <td rowspan="5" style="width: 20%">
                  <center>
                    <img src="files/user_photo/<?php echo $user_show['user_photo']; ?>" style="width: 160px; height: 200px;margin-bottom: 10px">
                    <a href="admin_change_siswapict.php?id=<?php echo $user_show['user_id']; ?>&ex=<?php echo session_id(); ?>'" type="button" class="btn btn-sm btn-success" style="width: 120px"><i class="far fa-images" style="margin-right: 5px"></i> Ganti Foto</a>
                  </center>
                </td>
              </tr>
              <tr>
                <td style="width: 30%;">Nomor Induk Siswa</td>
                <td style="width: 50%;"><?php echo $user_show['user_nip']; ?></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" class="form-control" value="<?php echo $user_show['user_name']; ?>" name="user_name" ></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select name="user_gender" class="form-control">
                    <option value="<?php echo $user_show['user_gender']; ?>" selected hidden><?php echo $user_show['user_gender']; ?></option>
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </td>
              </tr>
               <tr>
                <td>Role</td>
                <td><input type="text" class="form-control" value="<?php echo $user_show['user_role']; ?>" name="user_role" readonly></td>
              </tr>
              <tr>
              <input type="hidden" class="form-control" value="<?php echo $user_show['user_id']; ?>" name="user_id" >
            </tbody>
          </form>
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
