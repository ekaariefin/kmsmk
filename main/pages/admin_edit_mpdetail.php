<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_mapel.php');
include_once('../system/sys_other.php');
$qother = new other();
$qmapel = new mapel();
$mpid = $_GET['id'];
$mapel_show = $qother->mp_detail($mpid);

if(isset($_POST['save_edit_mp']))
  {
    $mapel_id      = $_POST['mapel_id'];
    $mapel_name    = $_POST['mapel_name'];
    if($qmapel->mapel_edit($mapel_id, $mapel_name)){
        // echo $mapel_id, $mapel_name;
        // exit();
        header('location: admin_show_mpdetail.php?id='.$mapel_show['mapel_id'].'&ex='.session_id());
    }
    else{
      header('location: admin_show_mpdetail.php?id='.$mapel_show['mapel_id'].'&ex='.session_id());
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
            <form action="" method="POST">
            <tbody>
              <tr>
                <div style="position: relative; float:right; margin-bottom: 10px">
                    <button type="submit" name="save_edit_mp" class="btn btn-sm btn-success" style="width: 90px"><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>   
                </div>
              </tr>
              <tr>
                <td style="width: 30%;">Nomor Registrasi</td>
                <td style="width: 50%;"><?php echo $mapel_show['mapel_id']; ?></td>
              </tr>
              <tr>
                <td>Nama Mata Pelajaran</td>
                <td><input type="text" class="form-control" value="<?php echo $mapel_show['mapel_name']; ?>" name="mapel_name"></td>
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
            <input type="hidden" class="form-control" value="<?php echo $mapel_show['mapel_id']; ?>" name="mapel_id" >

            </form>
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
