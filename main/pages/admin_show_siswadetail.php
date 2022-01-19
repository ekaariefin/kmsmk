<?php
session_start();
error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
$quser = new user();
$uid = $_GET['id'];
$user_show = $quser->user_detail($uid);

if (isset($_GET['delUser']))
{
  if($quser->user_delete($_GET['delUser'])){
    header('location:admin_userlist.php?ex='.session_id().'');
  }
}

if (isset($_GET['block'])){
  $block = $_GET['block'];
  if($block == 'yes'){
    $quser->set_block_true($uid);
  }
  else if($block == 'open'){
    $quser->set_block_false($uid);
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
          <h3 class="card-title">Informasi Data Diri Siswa</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <div style="position: relative; float:right; margin-bottom: 10px">
                  <a href="admin_edit_siswadetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-sm btn-info" style="width: 90px"><i class="far fa-edit" style="margin-right: 5px"></i> Edit</a>
                </div>
              </tr>
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
                <td>Asal Sekolah</td>
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
                foreach($showtacit as $tacit) {
              ?>
              <tr>
                <td style="width: 10%;"><center><?php echo $no++; ?></center></td>
                <td style="width: 70%;"><?php echo $tacit['tacit_name']; ?></td>
                <td style="width: 20%;"><a href="show_tacit.php?id=<?php echo $tacit['tacit_id']; ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-block bg-gradient-primary btn-sm">Lihat Detail</a></td>
              </tr>
              <?php
                }
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
                foreach($showexplicit as $explicit) {
              ?>
              <tr>
                <td style="width: 10%;"><center><?php echo $no++; ?></center></td>
                <td style="width: 70%;"><?php echo $explicit['explicit_name']; ?></td>
                <td style="width: 20%;"><a href="show_explicit.php?id=<?php echo $explicit['explicit_id']; ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-block bg-gradient-primary btn-sm">Lihat Detail</a></td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>


          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
              <tr>
                <td colspan="3"><b>AKSI TERHADAP PENGGUNA</b></td>
              </tr>
              <tr>
                <td>
                  <a href="admin_show_siswadetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>&block=yes" type="button" class="btn bg-gradient-warning btn-sm" onclick="return confirm('Apakah anda yakin ingin memblokir akun ini ?')">Blokir Akun</a>
                  <a href="admin_show_siswadetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>&block=open" type="button" class="btn bg-gradient-warning btn-sm" onclick="return confirm('Apakah anda yakin ingin membuka blokir akun ini ?')">Buka Akun</a>
                  <a href="admin_show_siswadetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>&delUser=<?php echo $uid; ?>" type="button" class="btn bg-gradient-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini ?')">Hapus Akun</a></td>
              </tr>
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
