<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_user.php');
include_once('../system/sys_explicit.php');
$qexplicit = new explicit();
$comment_id = $_GET['comment'];
  if(!is_null($comment_id))
  {
    $show = $qexplicit->explicit_edit_comment($comment_id);
  }
  else
  {
    header('location: my_explicit.php');
  }

  if(isset($_POST['editExplicitComment'])){
    $comment_id = $_POST['comment_id'];
    $comment_desc = $_POST['comment_desc'];
    $explicit_id = $_POST['explicit_id'];
    echo $comment_id;
    echo "<br/>";
    echo $comment_desc;
    if($qexplicit->explicit_save_comment($comment_id, $comment_desc)){
      header('location:show_explicit.php?id='.$explicit_id.'&ex='.session_id().'');
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
          <h3 class="card-title">Edit Komentar Saya</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
          <div style="position: relative; float:right; margin-bottom: 10px">
            <button type="submit" name="editExplicitComment" class="btn btn-info" style="width: 150px"><i class="far fa-save" style="margin-right: 5px"></i> Simpan</button>
          </div>
          <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
            <tbody>
              <input type="hidden" name="comment_id" value="<?php echo $_GET['comment']; ?>">
              <input type="hidden" name="explicit_id" value="<?php echo $_GET['explicit_id']; ?>">
                <td>Komentar</td>
                <td><input type="text" name="comment_desc" class="form-control" value="<?php echo $show['comment_desc']; ?>"></td>
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
