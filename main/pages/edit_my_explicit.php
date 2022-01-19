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
  
  if(isset($_POST['editExplicit'])){
    $id = $_POST['id'];
    $ex = $_POST['ex'];
    $explicit_name = $_POST['explicit_name'];
    $explicit_desc = $_POST['explicit_desc'];
    if($qexplicit->editExplicit($id, $explicit_name, $explicit_desc)){
      header('location:show_my_explicit.php?&ex='.session_id().'&id='.$id.'');
    }
  }
?>
<!DOCTYPE html>
<html>
  <?php include 'included/head.php'; ?>
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
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
          <form action="" method="POST">
          <div style="position: relative; float:right; margin-bottom: 10px">
            <button type="submit" name="editExplicit" class="btn btn-info" style="width: 150px"><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>
          </div>
          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tbody>
              <input type="hidden" name="id" value="<?php echo $qexplicit_show['explicit_id']; ?>">
              <input type="hidden" name="ex" value="<?php echo session_id(); ?>">
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
                <td><input type="text" name="explicit_name" class="form-control" value="<?php echo $qexplicit_show['explicit_name']; ?>"></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td><?php echo $qexplicit_show['mapel_name']; ?></td>
              </tr>
              <tr>
                <td colspan="2">Keterangan</td>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea name="explicit_desc" class="textarea"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      <?php echo $qexplicit_show['explicit_desc']; ?>
                    </textarea>
                </td>
              </tr>
              <tr>
                <td>File Attachment</td>
                <td><a href="files/<?php echo $qexplicit_show['explicit_file']; ?>"><?php echo $qexplicit_show['explicit_file']; ?></a></td>
              </tr>
            </tbody>
          </table>
        </form>
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
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>