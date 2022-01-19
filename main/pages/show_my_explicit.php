<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_explicit.php');
$qexplicit = new explicit();
$explicit_id = $_GET['id'];
  if(!is_null($explicit_id))
  {
    $qexplicit_show = $qexplicit->explicit_detail($explicit_id);
  }
  else
  {
    header('location: my_explicit.php');
  }
  if(isset($_POST['reply_comment']))
  {
      date_default_timezone_set('Asia/Jakarta');
      $comment_date = date('d F Y H:i:s');
      $user_id = $_SESSION['user_id'];
      $tacit_id = $_GET['id'];
      $comment_desc = $_POST['comment_desc'];

      if($qexplicit->add_explicit_comment($comment_date, $user_id, $explicit_id, $comment_desc))
      {
        header('location:show_my_explicit.php?ex='.session_id().'&id='.$explicit_id.'');
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
          <h3 class="card-title">Detail Explicit Knowledge Saya</h3>
        </div>
        <div class="card-body">
          <div style="position: relative; float:right; margin-bottom: 10px">
            <a href="edit_my_explicit.php?id=<?php echo $qexplicit_show['explicit_id']; ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-info" style="width: 150px"><i class="far fa-edit" style="margin-right: 5px"></i> Edit</a>
          </div>
          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tbody>
              <tr>
                <td>ID Knowledge</td>
                <td><?php echo $qexplicit_show['explicit_id']; ?></td>
              </tr>
              <tr>
                <td>Tanggal Publish</td>
                <td><?php echo $qexplicit_show['explicit_date']; ?></td>
              </tr>
              <tr>
                <td>Penulis</td>
                <td><?php echo ucwords(strtolower($qexplicit_show['user_name'])); ?></td>
              </tr>
              <tr>
                <td>Judul Knowledge</td>
                <td><?php echo $qexplicit_show['explicit_name']; ?></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td><?php echo $qexplicit_show['mapel_name']; ?></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><?php echo $qexplicit_show['explicit_desc']; ?></td>
              </tr>
              <tr>
                <td>File Attachment</td>
                <td><a href="files/<?php echo $qexplicit_show['explicit_file']; ?>"><?php echo $qexplicit_show['explicit_file']; ?></td>
              </tr>
            </tbody>
          </table>
          <!-- Komentar -->

          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tr>
              <td>
                <center><b>KOMENTAR DARI PENGGUNA</b></center>
              </td>
            </tr>
            <?php
            if($qexplicit->show_explicit_comment($explicit_id) == "No Data"){
             echo "<tr><td>Tidak ada komentar</td></tr>";
            }
            else{
              $qkomen = $qexplicit->show_explicit_comment($explicit_id);
              foreach($qkomen as $row) {
            ?>
            <tr>
              <td>
                <small>
                  <strong><?php echo $row['user_name']; ?></strong>
                  ( <?php echo $row['comment_date']; ?> )
                  <p><?php echo $row['comment_desc']; ?></p>
                </small>
              </td>
            </tr>
            <?php
              }}
            ?>
          </table>

          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tr>
              <td>
                <div style="width: 100%;">
                <form action="" method="POST">
                  <input type="text" class="form-control" name="comment_desc" style="width: 80%;position: relative;float: left;margin-right: 10px;" placeholder="Tulis komentar disini...">
                 <button type="submit" name="reply_comment" class="btn btn-info" style="width: 15%;position: relative;float: right;">
                  <i class="fas fa-paper-plane" style="margin-right: 10px"></i>Balas
                 </button>
                </form>
              </td>
            </tr>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
