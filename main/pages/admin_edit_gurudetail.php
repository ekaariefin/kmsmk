<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  $quser = new user();
  $uid = $_GET['id'];
  $user_show = $quser->teacher_detail($uid);

  if(isset($_POST['save_edit_guru'])){
    $user_id      = $_POST['user_id'];
    $user_name    = $_POST['user_name'];
    $user_gender  = $_POST['user_gender'];

    if($quser->edit_guru($user_id, $user_name, $user_gender))
    {
      header('location:admin_show_gurudetail.php?id='.$user_id.'&ex='.session_id().'');
    }

  }

  if(isset($_GET['delmapel'])){
    $mapel_id = $_GET['delmapel'];
    include_once('../system/sys_other.php');
    $qdel = new other();
    $mapel = $_GET['delmapel'];
    $user_id = $_GET['id'];

    if ($qdel->mp_del_gurumapel($mapel, $user_id)){
      header('location:admin_edit_gurudetail.php?id='.$uid.'&ex='.session_id().'');
    }
  }

  if(isset($_GET['addmapel'])){
    $mapel_id = $_GET['addmapel'];
    include_once('../system/sys_other.php');
    $qdel = new other();
    $guru_id = $_GET['id'];
    if ($qdel->mp_add_gurumapel($guru_id, $mapel_id)){
        header('location:admin_edit_gurudetail.php?id='.$uid.'&ex='.session_id().'');
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Informasi Tentang Guru/Pegawai</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <form action="" method="POST">
            <tbody>
              <tr>
                <div style="position: relative; float:right; margin-bottom: 10px">
                  <button type="submit" name="save_edit_guru" class="btn btn-sm btn-success" style="width: 90px"><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>
                </div>
              </tr>
              <tr>
                <td rowspan="5" style="width: 20%">
                  <center>
                    <img src="files/user_photo/<?php echo $user_show['user_photo']; ?>" style="width: 160px; height: 200px;margin-bottom: 10px">
                    <a href="admin_change_gurupict.php?id=<?php echo $user_show['user_id']; ?>&ex=<?php echo session_id(); ?>'" type="button" class="btn btn-sm btn-success" style="width: 120px"><i class="far fa-images" style="margin-right: 5px"></i> Ganti Foto</a>
                  </center>
                </td>
              </tr>
              <tr>
                <td style="width: 30%;">Nomor Induk Pegawai</td>
                <td style="width: 50%;"><?php echo $user_show['user_id']; ?></td>
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
              <input type="hidden" class="form-control" value="<?php echo $user_show['user_id']; ?>" name="user_id" >
            </tbody>
          </form>
          </table>

          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <div style="position: relative; float:right; margin-bottom: 10px">
                  <a href="admin_edit_addgurumapel.php?id=<?php echo $user_show['user_id']; ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-sm btn-success" style="width: 150px"><i class="far fa-images" style="margin-right: 5px"></i> Tambah Pelajaran</a>
                </div>
              </tr>
              <tr>
                <td colspan="4"><center><b>BIDANG STUDI/MATA PELAJARAN</b></center></td>
              </tr>
              <tr>
                <td><b><center>NO.</center></b></td>
                <td><b><center>KODE MAPEL</center></b></td>
                <td><b><center>NAMA MAPEL</center></b></td>
                <td></td>
              </tr>
              <?php
                $no = 1;
                $qgurumk = $quser->get_guru_mapel($user_show['user_id']);
                if($qgurumk == "No Data"){
                  echo "<tr><td colspan='4'><center>Belum ada data</center></td></tr>";
                }
                else{
                foreach($qgurumk as $mk) {
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $mk['mapel_id']; ?></center></td>
                <td><?php echo $mk['mapel_name']; ?></td>
                <td>
                  <center>
                  <a href="admin_edit_gurudetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>&delmapel=<?php echo $mk['mapel_id']; ?>" type="button" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </a>
                  </center>
                </td>
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
