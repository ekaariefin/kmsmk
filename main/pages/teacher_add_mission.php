<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');

  $qother = new other();
  if(isset($_POST['addGroup']))
  {
      $mission_name     = $_POST['mission_name'];
      $mission_target   = $_POST['mission_target'];
      $mission_reward   = $_POST['mission_reward'];
      $mission_task     = $_POST['mission_task'];
      $mission_expired  = $_POST['mission_expired'];
      $pembina          = $_SESSION['user_id'];
      if($qother->new_mission($mission_name, $mission_target, $mission_reward, $mission_task, $mission_expired, $pembina))
      {
        header('location:teacher_mission_control.php?ex='.session_id().'');
      }
  }
?>

<!DOCTYPE html>
<html>
  <?php include 'included/head.php'; ?>  
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <?php 
    include 'included/navbar.php';
    include 'included/sidebar.php';
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Missions</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Missions Baru</h3>
              </div>
              <form action="" method="POST">
                <div class="card-body">

                  <div class="form-group">
                    <label for="tacit_name">Judul Mission</label>
                    <select name="mission_name" class="form-control" required="">
                      <option selected disabled>--Pilih Jenis Mission--</option>
                      <option>Menambahkan Knowledge</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tacit_name">Target Pencapaian</label>
                    <input type="number" name="mission_target" class="form-control" autocomplete="off" placeholder="Masukkan Jumlah Target (misal : 5)" required="">
                  </div>

                  <div class="form-group">
                    <label for="tacit_name">Point Reward (0-100)</label>
                    <input type="text" name="mission_reward" class="form-control" autocomplete="off" placeholder="Masukkan Jumlah Poin Reward" required="">
                  </div>

                  <div class="form-group">
                    <label for="tacit_desc">Rincian Mission</label>
                    <textarea name="mission_task" class="textarea"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="">
                    </textarea>
                  </div>

                  <div class="form-group">
                    <label for="tacit_name">Masa Berakhir</label>
                    <input type="date" name="mission_expired" class="form-control" autocomplete="off" required="">
                  </div>

                  <div class="callout callout-info">
                    <small>Setelah berhasil menambahkan, mission akan tampil pada laman mission siswa</small>
                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" name="addGroup" class="btn btn-primary">Proses Misi Baru</button>
                </div>

              </form>
            </div>

    </section>
    <!-- /.content -->
  </div>
  <?php include 'included/footer.php'; ?>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>

