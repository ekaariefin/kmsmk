<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_tacit.php');
$qtacit = new tacit();
$tacit_id = $_GET['id'];
  if(!is_null($tacit_id))
  {
    $qtacit_show = $qtacit->tacit_detail($tacit_id);
  }
  else
  {
    header('location: my_tacit.php');
  }

  if(isset($_POST['editTacit'])){
    $id = $_POST['id'];
    $ex = $_POST['ex'];
    $tacit_name = $_POST['tacit_name'];
    $tacit_desc = $_POST['tacit_desc'];
    if($qtacit->editTacit($id, $tacit_name, $tacit_desc)){
      header('location:show_my_tacit.php?&ex='.session_id().'&id='.$id.'');
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
          <h3 class="card-title">Detail Tacit Knowledge Saya</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
          <div style="position: relative; float:right; margin-bottom: 10px">
            <button type="submit" name="editTacit" class="btn btn-info" style="width: 150px"><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>
          </div>
          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tbody>
              <input type="hidden" name="id" value="<?php echo $qtacit_show['tacit_id']; ?>">
              <input type="hidden" name="ex" value="<?php echo session_id(); ?>">
              <tr>
                <td>ID Knowledge</td>
                <td><?php echo $qtacit_show['tacit_id']; ?></td>
              </tr>
              <tr>
                <td>Tanggal Publish</td>
                <td><?php echo $qtacit_show['tacit_date']; ?></td>
              </tr>
              <tr>
                <td>Penulis</td>
                <td><?php echo ucwords(strtolower($qtacit_show['user_name'])); ?></td>
              </tr>
              <tr>
                <td>Judul Knowledge</td>
                <td><input type="text" name="tacit_name" class="form-control" value="<?php echo $qtacit_show['tacit_name']; ?>"></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td><?php echo $qtacit_show['mapel_name']; ?></td>
              </tr>
              <tr>
                <td colspan="2">Keterangan</td>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea name="tacit_desc" class="textarea"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      <?php echo $qtacit_show['tacit_desc']; ?>
                    </textarea>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
          
        </div>
      </div>
    </section>
  </div>
  <?php include 'included/footer.php'; ?>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
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