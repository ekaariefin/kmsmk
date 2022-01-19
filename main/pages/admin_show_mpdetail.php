<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_other.php');
$qother = new other();
$mpid = $_GET['id'];
$mapel_show = $qother->mp_detail($mpid);

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
          <h3 class="card-title">Informasi Tentang Mata Pelajaran</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <div style="position: relative; float:right; margin-bottom: 10px">
                   <a href="admin_mplist.php?&ex=<?php echo session_id() ?>&delmapel=<?php echo $mapel_show['mapel_id']; ?>" type="button" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus mata pelajaran ini, dengan menghapus mata pelajaran ini seluruh knowledge yang terekam dapat terhapus ?')" style="width: 100px"><i class="far fa-trash-alt" style="margin-right: 5px"></i> Delete</a>
                </div>
              </tr>
              <tr>
                <td style="width: 30%;">Nomor Registrasi</td>
                <td style="width: 50%;"><?php echo $mapel_show['mapel_id']; ?></td>
              </tr>
              <tr>
                <td>Nama Mata Pelajaran</td>
                <td><?php echo $mapel_show['mapel_name']; ?></td>
              </tr>
              <tr>
                <td>Jumlah Tacit Knowledge</td>
                <td>
                  <?php
                      echo $qother->mp_detail_count_tacit($mpid);
                  ?>
                </td>
              </tr>
              <tr>
                <td>Jumlah Explicit Knowledge</td>
                <td>
                  <?php
                      echo $qother->mp_detail_count_explicit($mpid);
                  ?>
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="3"><center><b>GURU YANG MENGAJAR</b></center></td>
              </tr>
              <tr>
                <td><b><center>No.</center></b></td>
                <td><b><center></center></b></td>
                <!-- <td><b><center>Nomor Induk</center></b></td> -->
                <td><b>Nama Guru</b></td>
              </tr>
              <?php
                if($qother->get_guru_mapel($mpid) == "No Data"){
                 echo "<tr><td colspan='3'>Belum ada Guru yang ditambahkan!</td></tr>";
                }
                else{
                  $no = 1;
                  $qgurumk = $qother->get_guru_mapel($mpid);
                  foreach($qgurumk as $guru) {
              ?>
              <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td>
                  <center>
                    <img class="img-fluid img-circle" src="files/user_photo/<?php echo $guru['user_photo']; ?>" style="width: 30px; height: 30px;"></td>
                  </center>
                </td>
                <!-- <td><center><?php echo $guru['guru_induk']; ?></center></td> -->
                <td><?php echo $guru['user_name']; ?></td>
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
