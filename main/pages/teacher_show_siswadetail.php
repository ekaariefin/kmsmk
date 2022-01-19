<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
$quser = new user();
$uid = $_GET['id'];
$user_show = $quser->user_detail($uid);
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

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Informasi Data Diri Siswa</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td rowspan="6" style="width: 20%"><img src="files/user_photo/<?php echo $user_show['user_photo']; ?>" style="width: 160px; height: 200px"></td>
              <tr>
                <td style="width: 30%;">Nomor Induk Siswa</td>
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
                <td>Kelas</td>
                <td><?php echo $user_show['class_name']; ?></td>
              </tr>
              <tr>
                <td>Nama Sekolah</td>
                <td><?php echo $user_show['nama_sekolah']; ?></td>
              </tr>
            </tbody>
          </table>


          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="3"><b>TACIT KNOWLEDGE</b></td>
              </tr>
              <?php
                $no = 1;
                include_once('../system/sys_tacit.php');
                $qtacit = new tacit();
                $showtacit = $qtacit->user_tacit_list($_GET['id']);
                if($showtacit == "No Data"){
                  echo '<tr><td>Tidak ada tacit knowledge yang ditemukan!</td></tr>';
                }
                else{
                foreach($showtacit as $tacit) {
              ?>
              <tr>
                <td style="width: 10%;"><center><?php echo $no++; ?></center></td>
                <td style="width: 70%;"><?php echo $tacit['tacit_name']; ?></td>
                <td style="width: 20%;"><a href="show_tacit.php?id=<?php echo $tacit['tacit_id']; ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-block bg-gradient-primary btn-sm">Lihat Detail</a></td>
              </tr>
              <?php
                }}
              ?>
            </tbody>
          </table>


          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="3"><b>EXPLICIT KNOWLEDGE</b></td>
              </tr>
              <?php
                $no = 1;
                include_once('../system/sys_explicit.php');
                $qexplicit = new explicit();
                $showexplicit = $qexplicit->user_explicit_list($_GET['id']);
                if($showexplicit == "No Data"){
                  echo '<tr><td>Tidak ada explicit knowledge yang ditemukan!</td></tr>';
                }
                else{
                foreach($showexplicit as $explicit) {
              ?>
              <tr>
                <td style="width: 10%;"><center><?php echo $no++; ?></center></td>
                <td style="width: 70%;"><?php echo $explicit['explicit_name']; ?></td>
                <td style="width: 20%;"><a href="show_explicit.php?id=<?php echo $explicit['explicit_id']; ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-block bg-gradient-primary btn-sm">Lihat Detail</a></td>
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
