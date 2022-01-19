<?php
  session_start();
  error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  $quser = new user();
  $uid = $_GET['id'];
  $user_show = $quser->teacher_detail($uid);
?>

<!DOCTYPE html>
<html>
  <?php 
    include 'included/head.php'; 
  ?>
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
                <td>Guru</td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="4"><center><b>TAMBAH BIDANG MATA PELAJARAN</b></center></td>
              </tr>
              <tr>
                <td><b><center>NO.</center></b></td>
                <td><b><center>KODE MAPEL</center></b></td>
                <td><b>NAMA MAPEL</b></td>
                <td></td>
              </tr>
              <?php
                include_once('../system/sys_mapel.php');
                $no = 1;
                $qmapel = new mapel();
                $qmapel_list = $qmapel->show_mapel($_SESSION['npsn_login']);
                if($qmapel_list == "No Data"){
                  echo "<tr><td colspan='4'><center>Belum ada data</center></td></tr>";
                }
                else{
                foreach($qmapel_list as $row) {
              ?>
              <tr>
                <td><center><?php echo $no++ ?></center></td>
                <td><center><?php echo $row['mapel_id']; ?></center></td>
                <td><?php echo $row['mapel_name']; ?></td>
                <td>
                  <center>
                  <a href="admin_edit_gurudetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>&addmapel=<?php echo $row['mapel_id']; ?>" type="button" class="btn btn-success">
                    <i class="far fa-plus-square"></i>
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
